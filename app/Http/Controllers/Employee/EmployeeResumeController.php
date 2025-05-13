<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResumeEducation;
use App\Models\ResumeExperience;
use App\Models\ResumeSkill;
use App\Models\Employee;
use Auth;
use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;


class EmployeeResumeController extends Controller
{

    public function create()
    {
        $listEducation =  ResumeEducation::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listExperience = ResumeExperience::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listSkill = ResumeSkill::where('employee_id', Auth::guard('employee')->id())->get();

        return view('employee.createresume', compact('listEducation', 'listExperience', 'listSkill'));
    }
    public function createEducation(Request $request)
    {
        $request->validate([
            'schoolName' => 'required',
            'qualification' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'details' => 'required',
        ]);

        $education = new ResumeEducation();
        $education->employee_id = Auth::guard('employee')->id();
        $education->school_name = $request->schoolName;
        $education->degree = $request->qualification;
        $education->start_date = $request->startDate;
        $education->end_date = $request->endDate;
        $education->details = $request->details;
        $education->save();

        return redirect()->back()->with('success', 'Education added successfully');
    }

    public function createExperience(Request $request)
    {
            $request->validate([
                'companyName' => 'required',
                'position' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'details' => 'required',
            ]);

            $experience = new ResumeExperience();
            $experience->employee_id = Auth::guard('employee')->id();
            $experience->work_name = $request->companyName;
            $experience->designation = $request->position;
            $experience->start_date = $request->startDate;
            $experience->end_date = $request->endDate;
            $experience->details = $request->details;
            $experience->save();

            return redirect()->back()->with('success', 'Experience added successfully');
    }

    public function createSkill(Request $request)
    {
        $request->validate([
            'skillName' => 'required',
        ]);

        $skill = new ResumeSkill();
        $skill->employee_id = Auth::guard('employee')->id();
        $skill->skill_name = $request->skillName;
        $skill->save();

        return redirect()->back()->with('success', 'Skill added successfully');
    }

    public function resumeView()
    {
        $listEducation =  ResumeEducation::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listExperience = ResumeExperience::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listSkill = ResumeSkill::where('employee_id', Auth::guard('employee')->id())->get();
        $employeeData = Employee::where('id', Auth::guard('employee')->id())->first();

        return view('employee.resume', compact('listEducation', 'listExperience', 'listSkill', 'employeeData'));
    }

  
public function generatePDF()
{

    // Get the HTML content for the PDF
    $html = View::make('employee.resume')->render();
    
    // Create a new instance of DomPDF
    $dompdf = new Dompdf();
    
    // Load the HTML into DomPDF
    $dompdf->loadHtml($html);
    
    // Set the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the PDF
    $dompdf->render();
    
    // Save the PDF to a file
    $pdf = $dompdf->output();
    file_put_contents('resume.pdf', $pdf);
    
    // Return a response to the user
    return response()->download('resume.pdf');
}
}
