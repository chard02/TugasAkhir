<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Researcher;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminResearcherController extends Controller
{
    public function index()
    {
        $researchers = Researcher::with('user')->latest()->get();
        return view('admin.researchers.index', compact('researchers'));
    }

    public function show($id)
    {
        $researcher = Researcher::with('user')->findOrFail($id);
        return view('admin.researchers.show', compact('researcher'));
    }

    public function approve($id)
    {
        $researcher = Researcher::findOrFail($id);
        $researcher->is_approved = true;
        $researcher->save();

        return redirect()->back()->with('success', 'Profil peneliti berhasil disetujui.');
    }

    public function destroy($id)
    {
        $researcher = Researcher::findOrFail($id);
        $user = $researcher->user;

        $researcher->delete();
        $user->delete();

        return redirect()->route('admin.researchers.index')->with('success', 'Peneliti berhasil dihapus.');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $user->assignRole('researcher');

        Researcher::create([
            'user_id'     => $user->id,
            'full_name'   => $request->name,
            'email'       => $request->email,
            'is_approved' => true, // ✅ langsung approved saat dibuat oleh admin
        ]);

        return redirect()->route('admin.researchers.create')->with('success', 'Akun peneliti berhasil dibuat.');
    }

    public function requests()
    {
        $pendingResearchers = Researcher::where('is_approved', false)->get();
        return view('admin.researchers.request', compact('pendingResearchers'));
    }

    public function edit($id)
    {
        $researcher = Researcher::with('user')->findOrFail($id);
        return view('admin.researchers.edit', compact('researcher'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name'         => 'required|string|max:255',
            'institution'       => 'nullable|string|max:255',
            'academic_position' => 'nullable|string|max:255',
            'expertise'         => 'nullable|string|max:255',
            'orcid_id'          => 'nullable|string|max:255',
            'scopus_id'         => 'nullable|string|max:255',
            'garuda_id'         => 'nullable|string|max:255',
            'googlescholar_id'  => 'nullable|string|max:255',
            'bio'               => 'nullable|string',
            'phone'             => 'nullable|string|max:20',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $researcher = Researcher::findOrFail($id);

        // Update nama user
        $researcher->user->update([
            'name' => $validated['full_name'],
        ]);

        // Update data researcher dan set is_approved = false
        $researcher->update(array_merge(
            collect($validated)->except('full_name')->toArray(),
            ['is_approved' => false] // ✅ perlu disetujui ulang
        ));

        return redirect()->route('admin.researchers.show', $id)->with('success', 'Data peneliti diperbarui dan menunggu persetujuan.');
    }

    public function toggleStatus($id)
    {
        $researcher = Researcher::findOrFail($id);
        $researcher->is_active = !$researcher->is_active;
        $researcher->save();

        return back()->with('success', 'Status peneliti diperbarui.');
    }
}
