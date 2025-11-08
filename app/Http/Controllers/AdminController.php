<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function manageRequests()
    {
        return view('admin.request');
    }

    public function manageProjects()
    {
        $allProjects = Project::with('user')->paginate(3);
        
        return view('admin.project', [
            'allProjects' => $allProjects
        ]);
    }

    public function managePricing()
    {
        return view('admin.pricing');
    }

    public function createProject()
    {
        return view('admin.add-new-project');
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        $defaultImage = 'mysabda.svg'; 

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $defaultImage,
            'user_id' => 1 
        ]);

        return redirect('/admin-project')->with('success', 'Project created successfully!');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        
        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
