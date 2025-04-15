<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisionMission;

class VisiMisiController extends Controller
{
    public function index(Request $request)
{
    $visi = VisionMission::where('type', 'visi')->first();
    $misi = VisionMission::where('type', 'misi')->first();
    $isEdit = $request->query('edit') == '1';

    return view('admin.visimisi.index', compact('visi', 'misi', 'isEdit'));
}


    public function create()
    {
        return view('admin.visimisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:visi,misi',
            'content' => 'required',
        ]);

        VisiMisi::create($request->only('type', 'content'));

        return redirect()->route('admin.visimisi.index')->with('success', 'Berhasil menambahkan data.');
    }

    public function upsert(Request $request)
{
    $request->validate([
        'visi' => 'required',
        'misi' => 'required',
    ]);

    // Simpan atau update visi
    VisionMission::updateOrCreate(
        ['type' => 'visi'],
        ['content' => $request->visi]
    );

    // Simpan atau update misi
    VisionMission::updateOrCreate(
        ['type' => 'misi'],
        ['content' => $request->misi]
    );

    return redirect()->route('admin.visimisi.index')->with('success', 'Visi dan Misi berhasil disimpan.');
}

}
