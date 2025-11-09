<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        return view('admin.index', [
            'adminName' => $currentUser->name
        ]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $uploadedFile = $request->file('image');
        
        // Use Cloudinary's uploadApi()->upload() method
        $uploadResult = Cloudinary::uploadApi()->upload($uploadedFile->getRealPath(), [
            'folder' => 'limpingen/projects',
            'resource_type' => 'image',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $uploadResult['secure_url'],
            'image_public_id' => $uploadResult['public_id'],
            'user_id' => Auth::id() ?? 1
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
