<?php

namespace App\Http\Controllers;

use App\Models\Package;


class PackageController extends Controller
{
    public function index()
    {
        $allPackages = Package::all();
        
        return view('pricing', [
            'allPackages' => $allPackages
        ]);
    }
}
