<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class AdminJobCategoryController extends Controller
{
    public function index()
    {
        $jobCategoryData = JobCategory::get();
        return view('admin.jobCategory', compact('jobCategoryData'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $jobCategory = new JobCategory();
        $jobCategory->name = $request->name;
        $jobCategory->icon = $request->icon;
        $jobCategory->save();

        return redirect()->back()->with('success', 'Job Category Created Successfully');
    }

    public function edit($id)
    {
        $jobCategoryID = JobCategory::where('id', $id)->first();
        return view('admin.jobCategoryEdit', compact('jobCategoryID'));
    }

    public function editCategory(Request $request, $id)
    {
        $jobCategory = JobCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $jobCategory->name = $request->name;
        $jobCategory->icon = $request->icon;
        $jobCategory->update();

        return redirect()->route('admin.job.category')->with('success', 'Job Category Updated Successfully');
    }

    public function delete($id)
    {
        $jobCategory = JobCategory::where('id', $id)->first();
        $jobCategory->delete();

        return redirect()->back()->with('success', 'Job Category Deleted Successfully');
    }
}
