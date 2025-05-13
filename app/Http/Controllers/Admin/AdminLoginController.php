<?php

// Specify the namespace for the controller
namespace App\Http\Controllers\Admin;

// Import the necessary classes
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin; // The Admin model
use Illuminate\Support\Str; // Import Str class for generating random strings
use App\Mail\WebsiteMailController; // The WebMail class for sending emails
use Hash; // The Hash facade for password hashing
use Auth; // The Auth facade for authentication

// Define the AdminLoginController class, which extends Laravel's base Controller class
class AdminLoginController extends Controller
{
    // Define the index method, which returns the admin login view
    public function index()
    {
        // Return the view for the admin login page
        return view('admin.login');
    }

    // Define the recoverPassword method, which returns the admin password recovery view
    public function recoverPassword()
    {
        // Return the view for the admin password recovery page
        return view('admin.recover');
    }

    // Define the sosLogin method, which returns the admin sos login view
    public function sosLogin()
    {
        // Return the view for the admin sos login page
        return view('admin.soslogin');
    }

    // Define the recoverSubmitPost method, which handles the admin password recovery form submission
    public function recoverSubmitPost(Request $request)
    {
        // Validate the email input from the password recovery form
        $request->validate([
            'email' => 'required|email'
        ]);

        // Check if an admin user with the provided email exists in the database
        $adminCheck = Admin::where('email', $request->email)->first();
        if(!$adminCheck) {
            // If no admin user exists, redirect the user back to the password recovery page with an error message
            return redirect()->route('admin.recover')->with('error', 'User with that email does not exists');
        }

        // Generate a token for the password recovery link using the current time
        $token = hash('sha256',time());

        // Save the token to the admin user's record in the database
        $adminCheck->token = $token;
        $adminCheck->update();

        // Generate the password recovery link using the token and the user's email
        $resetLink = url('admin/recoverPassword/'.$token.'/'.$request->email);

        // Set the subject and message for the password recovery email
        $subject = 'Password Reset Link';
        $message = $resetLink;

        $fullname = "Administrator";

        // Send the password recovery email to the user's email using the WebMail class
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.emailTemplate' ,['employer_name' => $fullname]));

        // Redirect the user back to the password recovery page with a success message
        return redirect()->route('admin.recover')->with('success', 'Password reset link has been sent to your email');
    }

    // Define the loginSubmitPost method, which handles the admin login form submission
    public function loginSubmitPost(Request $request)
    {
        // Validate the email and password inputs from the login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Retrieve the email and password credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the admin user with the given credentials
        if (Auth::guard('admin')->attempt($credentials)) {
            // If the authentication is successful, redirect the user to the admin dashboard
            return redirect()->intended(route('admin.home'));
        }

        // If the authentication fails, redirect the user back to the login page with an error message
        return redirect()->route('admin.login')->with('error', 'Invalid Username or Password');
    }

    // Define the logout method, which logs out the authenticated admin user
    public function logout()
    {
        // Log out the authenticated admin user
        Auth::guard('admin')->logout();

        // Redirect the user to the login page
        return redirect()->route('admin.login');
    }

    public function resetPassword($token, $email)
    {
        $adminCheck = Admin::where('email', $email)->where('token', $token)->first();
        if(!$adminCheck) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        return view('admin.resetPassword', compact('token', 'email'));
    }

    public function enterOTPassword($token)
    {
        $adminCheck = Admin::where('token', $token)->first();
        if(!$adminCheck) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        return view('admin.sosvalidate', compact('token', 'adminCheck'));
    }

    public function resetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'retype_password' => 'required|same:password'
        ]);

        $adminCheck = Admin::where('email', $request->email)->first();
        if(!$adminCheck) {
            return redirect()->route('admin.linkexpired')->with('tokenError', 'Invalid token or email');
        }

        $adminCheck->password = Hash::make($request->password);
        $adminCheck->token = '';
        $adminCheck->update();

        return redirect()->route('admin.login')->with('success', 'Password has been reset successfully');
    }

    public function sosLoginSubmitPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $adminCheck = Admin::where('email', $request->email)->first();
        if(!$adminCheck) {
            return redirect()->route('admin.soslogin')->with('error', 'User with that email does not exists');
        }

        $otp = Str::random(6); // generate a random 6-digit OTP
        $token = hash('sha256',$otp);
        $adminCheck->token = $token;
        $adminCheck->OTP = Hash::make($otp);
        $adminCheck->update();

        $resetLink = url('admin/recoverPassword/'.$token.'/'.$request->email);
        $subject = 'One Time Password Confirmation';
        $message = $otp;

        $fullname = $adminCheck->firstname.' '.$adminCheck->lastname;
        \Mail::to($request->email)->send(new WebsiteMailController($subject, $message, 'admin.email.OTPemailTemplate', ['employer_name' => $fullname]));

        return redirect()->route('admin.enterOTPassword',$token)->with('success', 'OTP Code has been sent to your email');
    }

    public function validateOTPasswordSubmit(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'token' => 'required'
        ]);

        $adminCheck = Admin::where('token', $request->token)->first();
        if(!$adminCheck) {
            return redirect()->route('admin.invalid')->with('tokenError', 'Invalid token or email');
        }

        // dd($adminCheck->otp, Hash::make($request->otp));

            if (Hash::check($request->otp, $adminCheck->otp)) {
                $adminCheck->token = '';
                $adminCheck->update();
        
                // Authenticate the user
                Auth::guard('admin')->login($adminCheck);
                $adminCheck->otp = '';
                $adminCheck->update();

                return redirect()->intended(route('admin.home'));
        }

        return redirect()->route('admin.enterOTPassword',$request->token)->with('error', 'Invalid OTP');
    }
} 