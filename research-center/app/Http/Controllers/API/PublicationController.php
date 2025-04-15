<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Researcher;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function fetchPublications(Request $request)
    {
        $query = $request->input('name');
        $orcidId = $request->input('orcid_id');
        if ($query) {
            $user = User::where('name', 'like', "%{$query}%")->first();
            if ($user) {
                $orcidId = $user->orcid_id;
            } else {
                return redirect()->back()->with('error', 'Peneliti tidak ditemukan.');
            }
        }
        
        if (!$orcidId) {
            return redirect()->back()->with('error', 'Masukkan ORCID ID atau Nama Peneliti terlebih dahulu.');
        }
        
        $publications = $this->getPublicationsFromOrcid($orcidId);
        
        if (isset($publications['error'])) {
            return redirect()->back()->with('error', $publications['error']);
        }
        
        // Simpan ke database
        $user = auth()->user();
        $researcher = $user->researcher;
        
        foreach ($publications as $pub) {
            $workSummary = $pub['work-summary'][0];
            
            Publication::updateOrCreate([
                'external_id' => $workSummary['put-code'], // ID unik dari ORCID
                'source' => 'orcid'
            ], [
                'researcher_id' => $researcher->id,
                'title' => $workSummary['title']['title']['value'] ?? 'No Title',
                'doi' => $workSummary['external-ids']['external-id'][0]['external-id-value'] ?? null,
                'publication_date' => $this->parseDate($workSummary['publication-date'] ?? null),
                'source' => 'orcid',
                'external_id' => $workSummary['put-code'],
                'authors' => null,
                'raw_data' => $workSummary,
            ]);
        }
        
        return view('researchers.publication', [
            'orcidPublications' => $publications,
            'source' => 'orcid',
            'orcidId' => $orcidId
        ]);
    }
    
    // Tambahkan helper parseDate()
    private function parseDate($date)
    {
        if (!$date || !isset($date['year']['value'])) return null;
        
        $year = $date['year']['value'];
        $month = $date['month']['value'] ?? '01';
        $day = $date['day']['value'] ?? '01';
        
        return "{$year}-{$month}-{$day}";
    }
    
    
    public function searchByTitle(Request $request)
    {
        $title = $request->input('title');
        
        if (!$title) {
            return redirect()->back()->with('error', 'Masukkan judul publikasi terlebih dahulu.');
        }
        
        $publications = $this->getPublicationsFromScopusByTitle($title);
        
        if (isset($publications['error'])) {
            return redirect()->back()->with('error', $publications['error']);
        }
        
        return view('researchers.publication', [
            'scopusPublications' => $publications,
            'source' => 'scopus',
            'title' => $title
        ]);
    }
    
    public function searchByScopusId(Request $request)
    {
        $scopusId = $request->input('scopus_id');
        
        if (!$scopusId) {
            return redirect()->back()->with('error', 'Masukkan Scopus ID terlebih dahulu.');
        }
        
        $publications = $this->getPublicationsFromScopus($scopusId);
        
        if (isset($publications['error'])) {
            return redirect()->back()->with('error', $publications['error']);
        }
        
        return view('researchers.publication', [
            'scopusPublications' => $publications,
            'source' => 'scopus',
            'scopusId' => $scopusId
        ]);
    }
    
    private function getPublicationsFromOrcid($orcidId)
    {
        if (!$orcidId) return [];
        
        $orcidUrl = "https://pub.orcid.org/v3.0/{$orcidId}/works";
        
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($orcidUrl);
        
        if ($response->failed()) {
            return ['error' => 'Gagal mengambil data dari ORCID'];
        }
        
        return $response->json()['group'] ?? [];
    }
    
    private function getPublicationsFromScopus($scopusId)
    {
        if (!$scopusId) return [];
        
        $apiKey = config('services.scopus.key');
        $scopusUrl = "https://api.elsevier.com/content/search/scopus?query=AU-ID({$scopusId})&apiKey={$apiKey}";
        
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($scopusUrl);
        
        if ($response->failed()) {
            return ['error' => 'Gagal mengambil data dari Scopus'];
        }
        
        return $response->json()['search-results']['entry'] ?? [];
    }
    
    
    
    private function getPublicationsFromScopusByTitle($title)
    {
        if (!$title) return [];
        
        $apiKey = config('services.scopus.key');
        $encodedTitle = urlencode($title);
        $scopusUrl = "https://api.elsevier.com/content/search/scopus?query=TITLE({$encodedTitle})&apiKey={$apiKey}";
        
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($scopusUrl);
        
        if ($response->failed()) {
            return ['error' => 'Gagal mengambil data dari Scopus'];
        }
        
        return $response->json()['search-results']['entry'] ?? [];
    }
    
    private function getPublicationsFromGaruda($garudaId)
    {
        if (!$garudaId) return [];
        
        $garudaUrl = "https://garuda.kemdikbud.go.id/api/publications/{$garudaId}";
        
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($garudaUrl);
        
        if ($response->failed()) {
            return ['error' => 'Gagal mengambil data dari Garuda'];
        }
        
        return $response->json()['publications'] ?? [];
    }
    
    
    private function getPublicationsFromGoogleScholar($scholarId)
    {
        $scholarId = trim($scholarId); // <-- Ini penting banget!
        $apiKey = config('services.serpapi.key');
        $url = "https://serpapi.com/search.json?engine=google_scholar_author&author_id={$scholarId}&api_key={$apiKey}";
        
        $response = Http::timeout(60)->get($url);
        
        if ($response->failed()) {
            return ['error' => 'Gagal mengambil data dari Google Scholar'];
        }
        
        return $response->json()['articles'] ?? [];
    }

    public function publications()
    {
        $user = auth()->user();
        
        $researcher = $user->researcher;
        
        $orcidId = $researcher->orcid_id ?? null;
        $scopusId = $researcher->scopus_id ?? null;
        $garudaId = $researcher->garuda_id ?? null;
        $googleScholarId = $researcher->googlescholar_id ?? null;
        
        $orcidPublications = $this->getPublicationsFromOrcid($orcidId);
        $scopusPublications = $this->getPublicationsFromScopus($scopusId);
        $garudaPublications = $this->getPublicationsFromGaruda($garudaId);
        $googleScholarPublications = $this->getPublicationsFromGoogleScholar($googleScholarId);

        
        return view('researchers.publication', [
            'orcidPublications' => $orcidPublications,
            'scopusPublications' => $scopusPublications,
            'garudaPublications' => $garudaPublications,
            'googleScholarPublications' => $googleScholarPublications,
        ]);
    }
}
    
