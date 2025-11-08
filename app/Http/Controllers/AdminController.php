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

    public function manageUsers()
    {
        $allUsers = User::paginate(8);

        return view('admin.users', [
            'allUsers' => $allUsers
        ]);
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

        return redirect('/admin-project');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        
        return redirect()->back();
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        
        return view('admin.edit-project', [
            'project' => $project
        ]);
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project = Project::findOrFail($id);
        
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin-project');
    }
}
