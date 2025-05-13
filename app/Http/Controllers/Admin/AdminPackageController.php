<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package', compact('packages'));
    }

    public function createPackageSubmit(Request $request)
    {
        $request->validate([
            'packageName' => 'required',
            'packagePrice' => 'required',
            'packageDuration' => 'required',
            'packageDurationType' => 'required',
            'totalJobAllowed' => 'required',
            'totalFeaturedJobs' => 'required',
            'totalPhotosAllowed' => 'required',
            'totalVideosAllowed' => 'required'
        ]);

        $package = new Package;
        $package->name = $request->packageName;
        $package->price = $request->packagePrice;
        $package->duration = $request->packageDuration;
        $package->duration_type = $request->packageDurationType;
        $package->jobs_count = $request->totalJobAllowed;
        $package->featured_count = $request->totalFeaturedJobs;
        $package->photos_count = $request->totalPhotosAllowed;
        $package->videos_count = $request->totalVideosAllowed;
        $package->save();

        return redirect()->route('admin.package')->with('success', 'Package created successfully');
    }

    public function editPackage($id)
    {
        $package = Package::where('id', $id)->first();
        return view('admin.editPackage', compact('package'));
    }

    public function editPackageSubmit(Request $request, $id)
    {
        $request->validate([
            'packageName' => 'required',
            'packagePrice' => 'required',
            'packageDuration' => 'required',
            'packageDurationType' => 'required',
            'totalJobAllowed' => 'required',
            'totalFeaturedJobs' => 'required',
            'totalPhotosAllowed' => 'required',
            'totalVideosAllowed' => 'required'
        ]);

        $package = Package::where('id', $id)->first();
        $package->name = $request->packageName;
        $package->price = $request->packagePrice;
        $package->duration = $request->packageDuration;
        $package->duration_type = $request->packageDurationType;
        $package->jobs_count = $request->totalJobAllowed;
        $package->featured_count = $request->totalFeaturedJobs;
        $package->photos_count = $request->totalPhotosAllowed;
        $package->videos_count = $request->totalVideosAllowed;
        $package->update();

        return redirect()->route('admin.package')->with('success', 'Package updated successfully');
    }

    public function deletePackage($id)
    {
        $package = Package::where('id', $id)->first();
        $package->delete();

        return redirect()->back()->with('success', 'Package deleted successfully');
    }
}