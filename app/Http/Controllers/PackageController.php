<?php

namespace App\Http\Controllers;

use App\Models\Package;


class PackageController extends Controller
{
    public function index()
    {
        $allPackages = Package::with('service')->get();
        
        // Group packages by service name
        $websitePackages = $allPackages->filter(function ($package) {
            return $package->service->name === 'Websites';
        });
        
        $mobileAppPackages = $allPackages->filter(function ($package) {
            return $package->service->name === 'Mobile Apps';
        });
        
        $digitalMarketingPackages = $allPackages->filter(function ($package) {
            return $package->service->name === 'Digital Marketing';
        });
        
        $eCommercePackages = $allPackages->filter(function ($package) {
            return $package->service->name === 'E-Commerce';
        });
        
        return view('pricing', [
            'websitePackages' => $websitePackages,
            'mobileAppPackages' => $mobileAppPackages,
            'digitalMarketingPackages' => $digitalMarketingPackages,
            'eCommercePackages' => $eCommercePackages
        ]);
    }
}
