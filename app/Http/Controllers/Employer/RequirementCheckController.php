<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;

class RequirementCheckController extends Controller
{
    public function index(Request $request)
    {
        return view('employer.requirementcheck');
    }

    public function addData(Request $request)
    {
        $request->validate([
            'fields.*' => 'required',
            'token' => 'required'
        ]);

        foreach($request->fields as $field)
        {
            $requirements = new Requirement();
            $requirements->requirements = $field;
            $requirements->token = $request->token;

            $requirements->save();
        }


        return redirect()->route('employer.requirement.view')->with('success', 'Requirement added successfully');
    }
}
