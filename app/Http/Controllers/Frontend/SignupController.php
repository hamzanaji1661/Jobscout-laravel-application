<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Employee;
use App\Mail\WebsiteMailController; // The WebMail class for sending emails
use Hash;
use Auth;

class SignupController extends Controller
{
    public function index()
    {
        return view('employer.signup');
    }
    public function employee()
    {
        return view('employee.signup');
    }

    public function signupSubmit(Request $request)
    {
        $request->validate([
            'employer_name' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employers',
            'username' => 'required|unique:employers',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $employer = new Employer();
        $employer->employer_name = $request->employer_name;
        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->email = $request->email;
        $employer->username = $request->username;
        $employer->token = $token;
        $employer->isverified = 0;
        $employer->password = Hash::make($request->password);
        $employer->save();

        $verifyLink = url('employer/verify-email/'.$token.'/'.$request->email);
        $subject = 'Verify Your Email';
        $message = $verifyLink;

        $fullname = $request->firstname.' '.$request->lastname;
        
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.verifyEmail', ['employer_name' => $fullname]));
        return redirect()->route('email.verifyemployer')->with('success', 'Verification has been sent to '.$request->email);
        
    }

    public function verifyEmail($token, $email)
    {
        $employer = Employer::where('token', $token)->where('email', $email)->first();
        if($employer) {
            $employer->isverified = 1;
            $employer->token = '';
            $employer->update();
            return redirect()->route('email.verifiedemployer')->with('success', 'Your email has been verified');
        } else {
            return redirect()->route('employer.signin')->with('error', 'Invalid verification link');
        }
    }

    public function signupSubmitEmployee(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employers',
            'username' => 'required|unique:employers',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $employer = new Employee();
        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->email = $request->email;
        $employer->username = $request->username;
        $employer->token = $token;
        $employer->isverified = 0;
        $employer->password = Hash::make($request->password);
        $employer->save();

        $verifyLink = route('verify.email.employee', ['token' => $token, 'email' => $request->email]);
        $subject = 'Verify Your Email';
        $message = $verifyLink;

        $fullname = $request->firstname.' '.$request->lastname;
        
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.verifyEmail', ['employer_name' => $fullname]));

        return redirect()->route('email.verify')->with('success', 'Verification has been sent to '.$request->email);
    }

    public function verifyEmailEmployee($token, $email)
    {
        $employer = Employee::where('token', $token)->where('email', $email)->first();
        if($employer) {
            $employer->isverified = 1;
            $employer->token = '';
            $employer->update();
            return redirect()->route('email.verified')->with('success', 'Your email has been verified');
        } else {
            return redirect()->route('employee.signin')->with('error', 'Invalid verification link');
        }
    }
}
