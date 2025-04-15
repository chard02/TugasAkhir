<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Researcher;
use App\Models\Publication;
use App\Models\Project;
use App\Models\Collaborator;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalResearchers' => Researcher::count(),
            'totalPublications' => Publication::count(),
            'totalProjects' => Project::count(),

            'pendingResearchers' => Researcher::where('is_approved', false)->orWhereNull('is_approved')->count(),
            'pendingProjects' => Project::where('status', 'pending')->count(),

            'collaboratorCount' => Collaborator::count(),
            'latestPublications' => Publication::latest()->take(5)->get(),

            'publicationsPerYear' => Publication::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
                ->groupBy('year')->orderBy('year')->get(),

            'newResearchersPerMonth' => Researcher::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', now()->year)
                ->groupBy('month')->get(),

        ]);
    }
}