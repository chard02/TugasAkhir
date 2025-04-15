<?php

namespace App\Http\Controllers\Researchers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Project;
use App\Models\Researcher;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $researcher = $user->researcher;

        $totalPublications = Publication::where('researcher_id', $researcher->id)->count();
        $activeProjects = Project::where('researcher_id', $researcher->id)->where('status', 'active')->count();

        // Menghitung jumlah proyek kolaboratif di mana peneliti terdaftar sebagai kolaborator
        $collaborativeProjects = Project::whereHas('collaborators', function ($q) use ($researcher) {
            $q->where('researcher_id', $researcher->id);
        })->count();

        return view('researchers.dashboard', compact(
            'totalPublications', 'activeProjects', 'collaborativeProjects', 'researcher'
        ));
    }
}
