<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Request as UserRequest;
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
        // Menggunakan eager loading untuk menghindari N+1 query problem
        $allRequests = UserRequest::with(['user', 'package'])->paginate(10);
        
        return view('admin.request.index', [
            'allRequests' => $allRequests
        ]);
    }
     public function viewRequestDetail($id)
    {
        $requestDetail = UserRequest::with(['user', 'package'])->findOrFail($id);

        return view('admin.request.detail', [
            'request' => $requestDetail
        ]);
    }

    public function editRequest($id)
    {
        $request = UserRequest::with(['user', 'package'])->findOrFail($id);

        return view('admin.request.edit', [
            'request' => $request
        ]);
    }

    public function updateRequest(Request $request, $id)
    {
        $userRequest = UserRequest::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,ongoing,rejected,done',
            'description' => 'required|string',
        ]);

        $userRequest->update([
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('request-detail', $id)->with('success', 'Request updated successfully!');
    }

    public function manageUsers()
    {
        $allUsers = User::paginate(8);

        return view('admin.user.index', [
            'allUsers' => $allUsers
        ]);
    }

    public function managePricing()
    {
        return view('admin.pricing');
    }

    public function createProject()
    {
        return view('admin.project.add-new-project');
    }
    public function manageProjects()
    {
        $allProjects = Project::with('user')->paginate(3);

        return view('admin.project.index', [
            'allProjects' => $allProjects
        ]);
    }
    
    public function storeProject(Request $request)
    {
        if ($request->hasFile('image')) {
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
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_url' => "https://res.cloudinary.com/dc6failxg/image/upload/v1762654465/No_Image_Available_zt8dja.jpg",
                'image_public_id' => "No_Image_Available_zt8dja",
                'user_id' => Auth::id() ?? 1
            ]);
        }

        return redirect('/admin-project');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image_public_id && $project->image_public_id !== 'No_Image_Available_zt8dja') {
            Cloudinary::uploadApi()->destroy($project->image_public_id);
        }
        $project->delete();

        return redirect()->back();
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.project.edit-project', [
            'project' => $project
        ]);
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete the old image from Cloudinary (only if it's not the placeholder)
            if ($project->image_public_id && $project->image_public_id !== 'No_Image_Available_zt8dja') {
                Cloudinary::uploadApi()->destroy($project->image_public_id);
            }

            $uploadedFile = $request->file('image');

            // Upload the new image to Cloudinary
            $uploadResult = Cloudinary::uploadApi()->upload($uploadedFile->getRealPath(), [
                'folder' => 'limpingen/projects',
                'resource_type' => 'image',
            ]);

            $updateData['image_url'] = $uploadResult['secure_url'];
            $updateData['image_public_id'] = $uploadResult['public_id'];
        }

        $project->update($updateData);

        return redirect('/admin-project');
    }
    public function deleteProjectImage($id)
    {
        $project = Project::findOrFail($id);

        // Only delete if it's not the placeholder image
        if ($project->image_public_id && $project->image_public_id !== 'No_Image_Available_zt8dja') {
            // Delete from Cloudinary
            Cloudinary::uploadApi()->destroy($project->image_public_id);

            // Update project with placeholder image
            $project->update([
                'image_url' => "https://res.cloudinary.com/dc6failxg/image/upload/v1762654465/No_Image_Available_zt8dja.jpg",
                'image_public_id' => "No_Image_Available_zt8dja",
            ]);
        }

        return redirect()->back();
    }
}
