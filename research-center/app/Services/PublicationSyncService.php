<?php

namespace App\Services;

use App\Models\Publication;
use App\Models\Researcher;
use Illuminate\Support\Facades\Http;

class PublicationSyncService
{
    public function syncFromOrcid(Researcher $researcher)
    {
        if (!$researcher->orcid_id) return;

        $url = "https://pub.orcid.org/v3.0/{$researcher->orcid_id}/works";

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);

        if ($response->failed()) return;

        $data = $response->json()['group'] ?? [];

        foreach ($data as $item) {
            $workSummary = $item['work-summary'][0];

            Publication::updateOrCreate([
                'external_id' => $workSummary['put-code'],
                'source' => 'orcid',
            ], [
                'researcher_id' => $researcher->id,
                'title' => $workSummary['title']['title']['value'] ?? '-',
                'publication_date' => $workSummary['publication-date']['year']['value'] ?? null,
                'doi' => $workSummary['external-ids']['external-id'][0]['external-id-value'] ?? null,
                'raw_data' => $item,
            ]);
        }
    }

    public function syncFromScopus(Researcher $researcher)
    {
        if (!$researcher->scopus_id) return;

        $apiKey = env('SCOPUS_API_KEY');
        $url = "https://api.elsevier.com/content/search/scopus?query=AU-ID({$researcher->scopus_id})&apiKey={$apiKey}";

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);

        if ($response->failed()) return;

        $entries = $response->json()['search-results']['entry'] ?? [];

        foreach ($entries as $entry) {
            Publication::updateOrCreate([
                'external_id' => $entry['dc:identifier'] ?? null,
                'source' => 'scopus',
            ], [
                'researcher_id' => $researcher->id,
                'title' => $entry['dc:title'] ?? '-',
                'journal' => $entry['prism:publicationName'] ?? null,
                'doi' => $entry['prism:doi'] ?? null,
                'publication_date' => $entry['prism:coverDate'] ?? null,
                'authors' => $entry['dc:creator'] ?? null,
                'raw_data' => $entry,
            ]);
        }
    }

    public function syncFromGaruda(Researcher $researcher)
    {
        if (!$researcher->garuda_id) return;

        $url = "https://garuda.kemdikbud.go.id/api/publications/{$researcher->garuda_id}";

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);

        if ($response->failed()) return;

        $data = $response->json()['publications'] ?? [];

        foreach ($data as $pub) {
            Publication::updateOrCreate([
                'external_id' => $pub['id'] ?? null,
                'source' => 'garuda',
            ], [
                'researcher_id' => $researcher->id,
                'title' => $pub['title'] ?? '-',
                'journal' => $pub['journal'] ?? null,
                'doi' => $pub['doi'] ?? null,
                'publication_date' => $pub['year'] ?? null,
                'authors' => $pub['authors'] ?? null,
                'raw_data' => $pub,
            ]);
        }
    }
    public function syncFromGoogleScholar(Researcher $researcher)
    {
        if (!$researcher->google_scholar_id) return;

        $url = "https://scholar.google.com/citations?user={$researcher->googlescholar_id}&hl=en&oi=ao";

        $response = Http::withHeaders(['Accept' => 'application/json'])->get($url);

        if ($response->failed()) return;

        // Parse the response to extract publication data
        // This is a placeholder, as Google Scholar does not provide a public API for this
        // You may need to use web scraping or another method to get the data

        // Example of how you might save the data
        Publication::updateOrCreate([
            'external_id' => null,
            'source' => 'google_scholar',
        ], [
            'researcher_id' => $researcher->id,
            'title' => 'Example Title',
            'journal' => 'Example Journal',
            'doi' => null,
            'publication_date' => null,
            'authors' => null,
            'raw_data' => [],
        ]);
    }
}
