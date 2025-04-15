<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{

public function index()
{
    $structures = Organization::whereNull('parent_id')->with('childrenRecursive')->get();
    return view('admin.organization.index', compact('structures'));
}


    public function create()
    {
        $allStructures = Organization::all(); // ini penting
        return view('admin.organization.create', compact('allStructures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('organization_photos', 'public');
        }

        Organization::create($validated);

        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $structure = Organization::findOrFail($id);
        return view('admin.organization.edit', compact('structure'));
    }

    public function update(Request $request, $id)
    {
        $structure = Organization::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($structure->photo && Storage::disk('public')->exists($structure->photo)) {
                Storage::disk('public')->delete($structure->photo);
            }
            $validated['photo'] = $request->file('photo')->store('organization_photos', 'public');
        }

        $structure->update($validated);

        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $structure = Organization::findOrFail($id);
        if ($structure->photo && Storage::disk('public')->exists($structure->photo)) {
            Storage::disk('public')->delete($structure->photo);
        }
        $structure->delete();

        return redirect()->route('admin.organization.index')->with('success', 'Struktur organisasi berhasil dihapus.');
    }
}
