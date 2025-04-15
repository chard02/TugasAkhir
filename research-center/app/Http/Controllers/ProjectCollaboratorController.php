<?php

namespace App\Http\Controllers\Researchers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCollaborator;
use Illuminate\Support\Facades\Auth;

class ProjectCollaboratorController extends Controller
{
    // Daftar kolaborator untuk sebuah project
    public function index($projectId)
    {
        $project = Project::with('collaborators')->findOrFail($projectId);
        return view('researchers.project_collaborators.index', compact('project'));
    }

    // Pengajuan bergabung ke proyek
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        $exists = ProjectCollaborator::where('project_id', $projectId)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah mendaftar kolaborasi untuk proyek ini.');
        }

        ProjectCollaborator::create([
            'project_id' => $projectId,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Permintaan kolaborasi dikirim.');
    }

    // Menyetujui kolaborator
    public function approve($id)
    {
        $collab = ProjectCollaborator::findOrFail($id);
        $collab->status = 'approved';
        $collab->save();

        return back()->with('success', 'Kolaborator disetujui.');
    }

    // Menolak kolaborator
    public function reject($id)
    {
        $collab = ProjectCollaborator::findOrFail($id);
        $collab->status = 'rejected';
        $collab->save();

        return back()->with('success', 'Kolaborator ditolak.');
    }

    // Menghapus kolaborator dari proyek
    public function destroy($id)
    {
        $collab = ProjectCollaborator::findOrFail($id);
        $collab->delete();

        return back()->with('success', 'Kolaborator dihapus.');
    }
}
