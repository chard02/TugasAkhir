<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('researcher.user')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function approve($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'approved';
        $project->save();

        return back()->with('success', 'Proyek berhasil disetujui.');
    }

    public function reject($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'rejected';
        $project->save();

        return back()->with('error', 'Proyek ditolak.');
    }
}
