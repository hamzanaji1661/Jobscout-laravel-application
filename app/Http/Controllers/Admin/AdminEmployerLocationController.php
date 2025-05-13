<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployerLocation;

class AdminEmployerLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $employerLocations = EmployerLocation::get();
        return view('admin.employerLocation', compact('employerLocations'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $employerLocation = new EmployerLocation();
        $employerLocation->name = $request->name;
        $employerLocation->save();

        return redirect()->route('admin.employer.location')->with('success', 'Employer Location created successfully.');
    }

    public function edit($id)
    {
        $employerLocationID = EmployerLocation::where('id', $id)->first();
        return view('admin.employerLocationEdit', compact('employerLocationID'));
    }

    public function update(Request $request, $id)
    {
        $employerLocation = EmployerLocation::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
        ]);

        $employerLocation->name = $request->name;
        $employerLocation->save();

        return redirect()->route('admin.employer.location')->with('success', 'Employer Location updated successfully.');
    }

    public function destroy($id)
    {
        $employerLocation = EmployerLocation::find($id);
        $employerLocation->delete();

        return redirect()->route('admin.employer.location')->with('success', 'Employer Location deleted successfully.');
    }
}
