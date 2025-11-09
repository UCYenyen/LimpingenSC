<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //
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

    public function createRequest(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'package_id' => 'required|exists:packages,id'
        ]);

        ModelsRequest::create([
            'description' => $request->description,
            'package_id' => $request->package_id,
            "status" => "pending",
            'user_id' => Auth::id()
        ]);

         return redirect('/');
    }
}
