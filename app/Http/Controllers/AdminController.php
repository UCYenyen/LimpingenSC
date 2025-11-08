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
        // Return dari validate: void (jika valid) atau throw ValidationException (jika invalid)

        $imageUrl = 'mysabda.svg';  // Line 59: Set default image URL
        // Return: string 'mysabda.svg'

        if ($request->hasFile('image')) {  // Line 61: Cek apakah ada file image yang diupload
            // Return dari hasFile: boolean (true/false)
            
            try {  // Line 62: Try-catch block untuk handle error
                
                $cloudName = config('cloudinary.cloud_name');  // Line 64: Ambil cloud name dari config
                // Return: string (cloud name) atau null jika tidak dikonfigurasi
                
                if ($cloudName && $cloudName !== '') {  // Line 66: Cek apakah Cloudinary sudah dikonfigurasi
                    // Return: boolean
                    
                    $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [  // Line 68: Upload ke Cloudinary
                        'folder' => 'projects'  // Line 69: Simpan dalam folder 'projects'
                    ]);
                    // Return dari upload: CloudinaryWrapper object dengan info file uploaded
                    
                    $imageUrl = $uploadedFileUrl->getSecurePath();  // Line 72: Ambil secure URL (https://)
                    // Return: string URL gambar di Cloudinary
                    
                } else {  // Line 73: Jika Cloudinary tidak dikonfigurasi
                    
                    $imageName = time() . '_' . $request->image->getClientOriginalName();  // Line 75: Generate nama file unique
                    // Return: string (timestamp_namafile.ext)
                    
                    $request->image->move(public_path('images/projects'), $imageName);  // Line 76: Pindahkan file ke public/images/projects
                    // Return: UploadedFile object
                    
                    $imageUrl = $imageName;  // Line 77: Set imageUrl dengan nama file
                    // Return: string (nama file)
                }
            } catch (\Exception $e) {  // Line 79: Catch semua exception
                
                // Line 80: Comment, tidak ada kode
                
                try {  // Line 83: Try lagi dengan local storage sebagai fallback
                    $imageName = time() . '_' . $request->image->getClientOriginalName();  // Line 84: Generate nama file
                    // Return: string
                    
                    $request->image->move(public_path('images/projects'), $imageName);  // Line 85: Simpan ke local
                    // Return: UploadedFile object
                    
                    $imageUrl = $imageName;  // Line 86: Set imageUrl
                    // Return: string
                    
                } catch (\Exception $localError) {  // Line 87: Jika local storage juga gagal
                    
                    return redirect()->back()  // Line 88: Redirect kembali ke halaman sebelumnya
                        ->withInput()  // Line 89: Bawa input data yang sudah diisi
                        // Return: RedirectResponse
                        ->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()]);  // Line 90: Bawa error message
                        // Return: RedirectResponse dengan error
                }
            }
        }

        Project::create([  // Line 95: Buat record baru di database table projects
            'name' => $request->name,  // Line 96: Isi kolom name
            'description' => $request->description,  // Line 97: Isi kolom description
            'image_url' => $imageUrl,  // Line 98: Isi kolom image_url
            'user_id' => Auth::id() ?? 1  // Line 99: Isi user_id dengan id user login, atau 1 jika tidak ada
            // Auth::id() return: int|null (ID user yang login atau null)
        ]);
        // Return dari create: Project model instance yang baru dibuat

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
