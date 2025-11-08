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
    public function storeProject(Request $request)  // Line 51: Method untuk menyimpan project baru, terima Request object
    {
        $request->validate([  // Line 53: Validasi input dari form
            'name' => 'required|string|max:255',  // Line 54: name wajib, string, max 255 karakter
            'description' => 'required|string',  // Line 55: description wajib, string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Line 56: image optional, harus image, max 2MB
        ]);
        $uploadedFile = $request->file('image');
        $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
            'folder' => 'limpingen/projects',
            'upload_preset' => config('cloudinary.upload_preset'), // Gunakan upload preset dari config
            'resource_type' => 'image',
        ]);

        Project::create([  // Line 95: Buat record baru di database table projects
            'name' => $request->name,  // Line 96: Isi kolom name
            'description' => $request->description,  // Line 97: Isi kolom description
            'image_url' => $uploadResult->getSecurePath(),  // Line 98: Isi kolom image_url
            'image_public_id' => $uploadResult->getPublicId(),
            'user_id' => Auth::id() ?? 1  // Line 99: Isi user_id dengan id user login, atau 1 jika tidak ada
            // Auth::id() return: int|null (ID user yang login atau null)
        ]);
        // Return dari create: Project model instance yang baru dibuat

        return redirect('/admin-project')->with('success', 'Project created successfully!');  // Line 102: Redirect ke /admin-project dengan success message
        // Return: RedirectResponse dengan flash message
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
