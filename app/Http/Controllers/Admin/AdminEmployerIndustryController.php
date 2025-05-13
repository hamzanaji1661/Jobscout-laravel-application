<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industry;

class AdminEmployerIndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $employerIndustry = Industry::get();
        return view('admin.Industry', compact('employerIndustry'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $employerIndustry = new Industry();
        $employerIndustry->name = $request->name;
        $employerIndustry->save();

        return redirect()->route('admin.industry')->with('success', 'Employer Industry created successfully.');
    }

    public function edit($id)
    {
        $employerIndustryID = Industry::where('id', $id)->first();
        return view('admin.industryEdit', compact('employerIndustryID'));
    }

    public function update(Request $request, $id)
    {
        $employerIndustry = Industry::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
        ]);

        $employerIndustry->name = $request->name;
        $employerIndustry->save();

        return redirect()->route('admin.industry')->with('success', 'Employer Industry updated successfully.');
    }

    public function delete($id)
    {
        $employerIndustry = Industry::find($id);
        $employerIndustry->delete();

        return redirect()->route('admin.industry')->with('success', 'Employer Industry deleted successfully.');
    }
}
