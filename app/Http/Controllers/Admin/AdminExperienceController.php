<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class AdminExperienceController extends Controller
{
    public function index()
    {
        $jobExperienceData = Experience::get();
        return view('admin.experience', compact('jobExperienceData'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $experience = new Experience();
        $experience->name = $request->name;
        $experience->save();

        return redirect()->back()->with('success', 'Experience Created Successfully');
    }

    public function edit($id)
    {
        $jobExperienceID = Experience::where('id', $id)->first();
        return view('admin.experienceEdit', compact('jobExperienceID'));
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $experience->name = $request->name;
        $experience->update();

        return redirect()->route('admin.job.experience')->with('success', 'Experience Updated Successfully');
    }

    public function delete($id)
    {
        $experience = Experience::where('id', $id)->first();
        $experience->delete();

        return redirect()->back()->with('success', 'Experience Deleted Successfully');
    }
}
