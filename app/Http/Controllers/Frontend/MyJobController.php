<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hiring;

class MyJobController extends Controller
{
    // public function index(Request $request)
    // {
    //     return view('frontend.singlehiring');
    // }
    public function jobDetails($id)
    {
        $jobPost = Hiring::where('id',$id)->first();

        // $jobPost->view_count = $blogPost->view_count + 1;
        // $jobPost->update();

        $relatedJobs = Hiring::where('category', $jobPost->category)->where('id', '!=', $jobPost->id)->get()->take(3);

        dd($relatedJobs);

        return view('frontend.singlehiring', compact('jobPost', 'relatedJobs'));
    }
}
