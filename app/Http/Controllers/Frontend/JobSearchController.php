<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hiring;
use App\Models\JobCategory;
use App\Models\Location;
use App\Models\JobType;
use App\Models\SalaryRange;
use App\Models\Experience;

class JobSearchController extends Controller
{
    public function index(Request $request)
    {
        $hiringQuery = $request->jobs;
        $hiringLocation = $request->location;
        $hiringCategory = $request->category;
        $hiringType = $request->jobtype;
        $hiringSalary = $request->salaryrange;
        $hiringExperience = $request->experience;

       $hirings = Hiring::where('status', 'Published')->orderBy('id', 'desc');
       $categories = JobCategory::orderBy('name', 'asc')->get();
       $locations = Location::orderBy('name', 'asc')->get();
       $jobtype = JobType::orderBy('name', 'asc')->get();
       $salaryrange = SalaryRange::orderBy('name', 'asc')->get();
       $experience = Experience::orderBy('name', 'asc')->get();

       if($hiringQuery != null){
          $hirings = $hirings->where('title', 'like', '%'.$hiringQuery.'%');
       }

        if($hiringLocation != null){
            $hirings = $hirings->where('location', 'like', '%'.$hiringLocation.'%');
        }

        if($hiringCategory != null){
           $hirings = $hirings->where('category', 'like', '%'.$hiringCategory.'%');
        }

        if($hiringType != null){
            $hirings = $hirings->where('type', 'like', '%'.$hiringType.'%');
        }

        if($hiringSalary != null){
            $hirings = $hirings->where('salary', 'like', '%'.$hiringSalary.'%');
        }

        if($hiringExperience != null){
            $hirings = $hirings->where('experiance', 'like', '%'.$hiringExperience.'%');
        }

        $hirings = $hirings->paginate(6);
        $hirings = $hirings->appends($request->all());

       

        return view('frontend.jobSearch', compact('hirings', 'categories', 'locations', 'jobtype', 'salaryrange', 'experience', 'hiringQuery', 'hiringLocation', 'hiringCategory', 'hiringType', 'hiringSalary', 'hiringExperience'));
    }
}
