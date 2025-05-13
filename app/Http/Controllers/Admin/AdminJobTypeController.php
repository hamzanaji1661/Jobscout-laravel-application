<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;

class AdminJobTypeController extends Controller
{
    public function index()
    {
        $jobTypes = JobType::get();
        return view('admin.jobType', compact('jobTypes'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $jobType = new JobType();
        $jobType->name = $request->name;
        $jobType->save();

        return redirect()->back()->with('success', 'Job Type Created Successfully');
    }

    public function edit($id)
    {
        $jobTypeID = JobType::where('id', $id)->first();
        return view('admin.jobTypeEdit', compact('jobTypeID'));
    }

    public function update(Request $request, $id)
    {
        $jobType = JobType::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $jobType->name = $request->name;
        $jobType->update();

        return redirect()->route('admin.job.type')->with('success', 'Job Type Updated Successfully');
    }

    public function delete($id)
    {
        $jobType = JobType::where('id', $id)->first();
        $jobType->delete();

        return redirect()->back()->with('success', 'Job Type Deleted Successfully');
    }
}
