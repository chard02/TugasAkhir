<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('researcher_id', auth()->user()->researcher->id)->get();
        return view('researchers.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('researchers.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Project::create([
            'researcher_id' => auth()->user()->researcher->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
        ]);

        return redirect()->route('researcher.projects.index')->with('success', 'Proyek berhasil diajukan.');
    }
}
