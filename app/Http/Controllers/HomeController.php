<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $allServices = Service::all();
        
        $featuredProjects = Project::latest()->limit(6)->get();
        
        return view('welcome', [
            'featuredProjects' => $featuredProjects,
            'allServices' => $allServices
        ]);
    }
}
