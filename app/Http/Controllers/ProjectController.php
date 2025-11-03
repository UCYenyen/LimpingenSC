<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {        
        $allProjects = Project::all();
        
        return view('projects.projects', [
            'allProjects' => $allProjects
        ]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        
        return view('projects.project-detail', [
            'project' => $project
        ]);
    }
}
