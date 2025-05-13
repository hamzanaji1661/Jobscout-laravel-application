<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;
use App\Models\Hiring;
use App\Models\EmployerAward;

class EmployerDetailsController extends Controller
{
    public function employerDetails($id)
    {
        $employer = Employer::find($id);
        $hiring = Hiring::where('company_id', $id)->count();
        $EmployerAward = EmployerAward::where('employer_id', $id)->orderBy('award_year', 'DESC')->get();
        return view('Frontend.employerdetails', compact('employer', 'hiring', 'EmployerAward'));
    }

    public function browseEmployer()
    {
    $employers = Employer::select('employer_name', 'id')
        ->groupBy('id', 'employer_name', DB::raw("SUBSTRING(employer_name, 1, 1)"))
        ->orderBy(DB::raw("SUBSTRING(employer_name, 1, 1)"))
        ->get();
        

        $groupedData = collect($employers)->groupBy(function ($item) {
            return strtoupper(substr($item->employer_name, 0, 1));

    });
    return view('Frontend.employerlist', compact('groupedData'));
    }
}
