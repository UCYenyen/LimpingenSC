<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;

class ServiceController extends Controller
{
    public function request()
    {
        $allServices = Service::all();
        
        return view('request', [
            'allServices' => $allServices
        ]);
    }
     public function getPackages(Service $service)
    {
        return response()->json(
            $service->packages()->get(['id', 'name', 'price', 'description'])
        );
    }

    // public function getPackages($id)
    // {
    //     $packages = Package::where('service_id', $id)->get(['id', 'name']);
    //     return response()->json($packages);
    // }
}
