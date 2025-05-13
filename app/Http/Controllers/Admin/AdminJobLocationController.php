<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class AdminJobLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $jobLocations = Location::get();
        return view('admin.jobLocation', compact('jobLocations'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $jobLocation = new Location();
        $jobLocation->name = $request->name;
        $jobLocation->save();

        return redirect()->route('admin.job.location')->with('success', 'Job Location created successfully.');
    }

    public function edit($id)
    {
        $jobLocationID = Location::where('id', $id)->first();
        return view('admin.jobLocationEdit', compact('jobLocationID'));
    }

    public function update(Request $request, $id)
    {
        $jobLocation = Location::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
        ]);

        $jobLocation->name = $request->name;
        $jobLocation->save();

        return redirect()->route('admin.job.location')->with('success', 'Job Location updated successfully.');
    }

    public function destroy($id)
    {
        $jobLocation = Location::find($id);
        $jobLocation->delete();

        return redirect()->route('admin.job.location')->with('success', 'Job Location deleted successfully.');
    }
}
