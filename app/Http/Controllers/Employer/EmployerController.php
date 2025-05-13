<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeApplication;
use App\Models\Hiring;
use App\Models\BoostOrder;



class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }

    public function index()
    {
        $totalJobPosted = Hiring::where('company_id', auth()->user()->id)->count();
        $totalExpiredJob = Hiring::where('company_id', auth()->user()->id)->where('status', 'Expired')->count();
        $totalActiveJob = Hiring::where('company_id', auth()->user()->id)->where('status', 'Published')->count();
        $totalBoostedJob = Hiring::where('company_id', auth()->user()->id)->where('isBoosted', 'yes')->count();
        $payments = BoostOrder::where('employer_id', auth()->user()->id)->get();

        return view('employer.dashboard', compact('totalJobPosted', 'totalExpiredJob', 'totalActiveJob', 'totalBoostedJob', 'payments'));
    }

    public function payment()
    {
        return view('employer.profile');
    }

    public function viewApplications()
    {
        $applications = EmployeeApplication::with('jobdetails', 'employee')->whereHas('jobdetails', function($query){ $query->where('company_id', auth()->user()->id);})->orderBy('similarityScore', 'desc')->get();
        
        return view('livewire.chat.create-chat', compact('applications'));
    }

    public function viewApplicants($id)
    {
        $applications = EmployeeApplication::with('jobdetails', 'employee')->whereHas('jobdetails', function($query) use ($id){ $query->where('company_id', auth()->user()->id)->where('job_id', $id);})->orderBy('similarityScore', 'desc')->get();
        // dd($applications);
        return view('employer.applications', compact('applications'));
    }
    
}
