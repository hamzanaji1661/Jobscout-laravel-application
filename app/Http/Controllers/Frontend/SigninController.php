<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Employee;
use Hash;
use Auth;

class SigninController extends Controller
{
    public function index()
    {
        // This method renders the employer signin view.
        return view('employer.signin');
    }

    public function employee()
    {
        // This method renders the employee signin view.
        return view('employee.signin');
    }

    public function signinSubmit(Request $request, Employer $employer)
    {
        // This method handles the employer signin submission.
        // Validate the request.
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        // Get the employer from the database.
        $employer = Employer::where('username', $request->username)->first();

        // If the employer does not exist, redirect to the signin page with an error message.
        if (!$employer) {
            return redirect()->route('employer.signin')->with('error', 'User with that username does not exists');
        }

        // Check if the password is correct.
        if (!Hash::check($request->password, $employer->password)) {
            return redirect()->route('employer.signin')->with('error', 'Incorrect password');
        }

        // Check if the employer is verified.
        if (!$employer->isverified) {
            return redirect()->route('employer.signin')->with('error', 'Your email is not verified');
        }

        if ($employer->isSuspended == 'yes') {
            return redirect()->route('employer.signin')->with('error', 'Your account has been suspended. Please contact the administrator for more information.');
        }

        // Login the employer.
        Auth::guard('employer')->login($employer);

        // Redirect to the employer dashboard.
        return redirect()->route('employer.dashboard');
    }

    public function employerLogout()
    {
        // This method logs out the employer.
        Auth::guard('employer')->logout();

        // Redirect to the employer signin page.
        return redirect()->route('employer.signin');
    }
    public function employeeLogout()
    {
        // This method logs out the employer.
        Auth::guard('employee')->logout();

        // Redirect to the employer signin page.
        return redirect()->route('employee.signin');
    }

    public function signinSubmitEmployee(Request $request, Employee $employee)
    {
        // This method handles the employee signin submission.
        // Validate the request.
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        // Get the employee from the database.
        $employee = Employee::where('username', $request->username)->first();

        // If the employee does not exist, redirect to the signin page with an error message.
        if (!$employee) {
            return redirect()->route('employee.signin')->with('error', 'User with that username does not exists');
        }

        // Check if the password is correct.
        if (!Hash::check($request->password, $employee->password)) {
            return redirect()->route('employee.signin')->with('error', 'Incorrect password');
        }

        // Check if the employee is verified.
        if (!$employee->isverified) {
            return redirect()->route('employee.signin')->with('error', 'Your email is not verified');
        }
        if ($employee->isDeleted) {
            return redirect()->route('employee.signin')->with('error', 'You have deleted this account ' . $employee->updated_at->diffForHumans());
        }

        // Login the employee.
        Auth::guard('employee')->login($employee);

        // Redirect to the employee dashboard.
        return redirect()->route('employee.dashboard');
    }

    public function changePasswordEmployee()
    {
        // This method renders the employee change password view.
        return view('employee.changepassword');
    }

    public function changePasswordEmployeeConfirm(Request $request)
    {
        // This method handles the employee change password submission.
        // Validate the request.
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|min:6',
        ]);

        // Get the employee from the database.
        $employee = Employee::where('id', Auth::guard('employee')->user()->id)->first();

        // Check if the old password is correct.
        if (!Hash::check($request->oldpassword, $employee->password)) {
            return redirect()->back()->with('error', 'Incorrect old password');
        }

        // Check if the new password and confirm password are the same.
        if ($request->newpassword != $request->confirmpassword) {
            return redirect()->back()->with('error', 'New password and confirm password are not the same');
        }

        // Update the employee password.
        $employee->password = Hash::make($request->newpassword);
        $employee->save();

        // Redirect to the employee dashboard.
        return redirect()->route('employee.dashboard')->with('success', 'Password changed successfully');
    }

    public function changePasswordEmployer()
    {
        // This method renders the employee change password view.
        return view('employer.changepassword');
    }

    public function changePasswordEmployerConfirm(Request $request)
    {
        // This method handles the employee change password submission.
        // Validate the request.
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|min:6',
        ]);

        // Get the employee from the database.
        $employer = Employee::where('id', Auth::guard('employer')->user()->id)->first();

        // Check if the old password is correct.
        if (!Hash::check($request->oldpassword, $employer->password)) {
            return redirect()->back()->with('error', 'Incorrect old password');
        }

        // Check if the new password and confirm password are the same.
        if ($request->newpassword != $request->confirmpassword) {
            return redirect()->back()->with('error', 'New password and confirm password are not the same');
        }

        // Update the employee password.
        $employer->password = Hash::make($request->newpassword);
        $employer->save();

        // Redirect to the employee dashboard.
        return redirect()->route('employer.dashboard')->with('success', 'Password changed successfully');
    }
}
