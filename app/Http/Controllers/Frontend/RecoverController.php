<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Employee;
use App\Mail\WebsiteMailController;
use Hash;
use Auth;

class RecoverController extends Controller
{
    public function recoverEmployer()
    {
        return view('employer.recover');
    }
    public function recoverEmployee()
    {
        return view('employee.recover');
    }
    

    public function recoverEmployerSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $employer = Employer::where('email', $request->email)->first();
        if(!$employer) {
            return redirect()->route('employer.recover')->with('error', 'User with that email does not exists');
        }

        $token = hash('sha256',time());

        $employer->token = $token;
        $employer->update();
        $resetLink = url('employer/recover/'.$token.'/'.$request->email);
        $subject = 'Password Reset Link';
        $message = $resetLink;
        $fullname = 'something';
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.emailTemplate', ['employer_name' => $fullname]));

        return redirect()->route('employer.recover')->with('success', 'Password reset link has been sent to your email');
    }

    public function resetPassword($token, $email)
    {
        $employer = Employer::where('email', $email)->where('token', $token)->first();
        if(!$employer) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        return view('employer.resetPassword', compact('token', 'email'));
    }

    public function resetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $employer = Employer::where('email', $request->email)->where('token', $request->token)->first();
        if(!$employer) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        $employer->password = Hash::make($request->password);
        $employer->token = null;
        $employer->update();

        return redirect()->route('employer.signin')->with('success', 'Password has been reset successfully');
    }

    public function recoverEmployeeSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $employee = Employee::where('email', $request->email)->first();
        if(!$employee) {
            return redirect()->route('employee.recover')->with('error', 'User with that email does not exists');
        }

        $token = hash('sha256',time());

        $employee->token = $token;
        $employee->update();
        $resetLink = url('employee/recover/'.$token.'/'.$request->email);
        $subject = 'Password Reset Link';
        $message = $resetLink;
        $fullname = $employee->firstname.' '.$employee->lastname;
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.emailTemplate', ['employer_name' => $fullname]));

        return redirect()->route('employee.recover')->with('success', 'Password reset link has been sent to your email');
    }



    public function resetEmployeePassword($token, $email)
    {
        $employee = Employee::where('email', $email)->where('token', $token)->first();
        if(!$employee) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        return view('employee.resetPassword', compact('token', 'email'));
    }

    public function resetEmployeePasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $employee = Employee::where('email', $request->email)->where('token', $request->token)->first();
        if(!$employee) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        $employee->password = Hash::make($request->password);
        $employee->token = null;
        $employee->update();

        return redirect()->route('employee.signin')->with('success', 'Password has been reset successfully');
    }


}
