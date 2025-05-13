<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployerSize;
class AdminEmployerSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $employerSize = EmployerSize::get();
        return view('admin.employerSize', compact('employerSize'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $employerSize = new EmployerSize();
        $employerSize->name = $request->name;
        $employerSize->save();

        return redirect()->route('admin.employer.size')->with('success', 'Employer Size created successfully.');
    }

    public function edit($id)
    {
        $employerSizeID = EmployerSize::where('id', $id)->first();
        return view('admin.employerSizeEdit', compact('employerSizeID'));
    }

    public function update(Request $request, $id)
    {
        $employerSize = EmployerSize::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
        ]);

        $employerSize->name = $request->name;
        $employerSize->save();

        return redirect()->route('admin.employer.size')->with('success', 'Employer Size updated successfully.');
    }

    public function destroy($id)
    {
        $employerSize = EmployerSize::find($id);
        $employerSize->delete();

        return redirect()->route('admin.employer.size')->with('success', 'Employer Size deleted successfully.');
    }

}
