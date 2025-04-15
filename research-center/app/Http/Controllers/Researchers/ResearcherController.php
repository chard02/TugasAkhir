<?php

namespace App\Http\Controllers\Researchers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Researcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearcherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();

        if (!$user->hasRole('researcher')) {
            abort(403, 'Akses ditolak');
        }

        return view('Researchers.dashboard');
    }

    public function editProfile()
    {
        $user = Auth::user();

        if (!$user->hasRole('researcher')) {
            abort(403, 'Akses ditolak');
        }

        $researcher = $user->researcher;

        return view('researchers.editprofile', compact('user', 'researcher'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if (!$user->hasRole('researcher')) {
            return redirect()->back()->withErrors(['error' => 'Anda bukan peneliti.']);
        }

        $validated = $request->validate([
            'institution' => 'nullable|string|max:255',
            'academic_position' => 'nullable|string|max:255',
            'expertise' => 'nullable|string|max:255',
            'orcid_id' => 'nullable|string|max:255',
            'scopus_id' => 'nullable|string|max:255',
            'garuda_id' => 'nullable|string|max:255',
            'googlescholar_id' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $researcher = $user->researcher;

        if (!$researcher) {
            $researcher = new Researcher();
            $researcher->user_id = $user->id;
        }

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            if ($researcher->photo) {
                Storage::disk('public')->delete($researcher->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $researcher->photo = $photoPath;
        }

        // Update data lainnya
        $researcher->fill([
            'institution' => $request->institution,
            'academic_position' => $request->academic_position,
            'expertise' => $request->expertise,
            'orcid_id' => $request->orcid_id,
            'scopus_id' => $request->scopus_id,
            'garuda_id' => $request->garuda_id,
            'googlescholar_id' => $request->googlescholar_id,
            'bio' => $request->bio,
            'phone' => $request->phone,
        ]);
        $researcher->is_approved = false; // <--- Tambahkan ini

        $researcher->save();

        return redirect()->route('researchers.editprofile')->with('message', 'Profil berhasil diperbarui dan menunggu persetujuan admin.');
    }

    public function showProfile()
    {
        $user = Auth::user();

        if (!$user->hasRole('researcher')) {
            abort(403, 'Akses ditolak');
        }

        $researcher = $user->researcher;

        return view('researchers.profile', compact('user', 'researcher'));
    }

    
}
