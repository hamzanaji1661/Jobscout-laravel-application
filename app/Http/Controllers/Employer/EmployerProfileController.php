<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\EmployerLocation;
use App\Models\Industry;
use App\Models\EmployerSize;
use Auth;
use Hash;

class EmployerProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }

    public function index()
    {

        $employerLocation = EmployerLocation::orderBy('name', 'asc')->get();
        $industry = Industry::orderBy('name', 'asc')->get();
        $employerSize = EmployerSize::orderBy('name', 'asc')->get();

        return view('employer.profile', compact('employerLocation', 'industry', 'employerSize'));
    }

    public function edit(Request $request)
    {

        $employer = Employer::where('id', Auth::guard('employer')->user()->id)->first();

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'employer_name' => 'required',
            'email' => 'required|unique:employers,email,' . $employer->id,
            'phone' => 'required',
            'website' => 'required',
            'industry' => 'required',
            'employer_size' => 'required',
            'address_id' => 'required',
            'founded' => 'required',
            'about' => 'required',
        ]);


        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->employer_name = $request->employer_name;
        $employer->email = $request->email;
        $employer->phone = $request->phone;
        $employer->website = $request->website;
        $employer->industry = $request->industry;
        $employer->size = $request->employer_size;
        $employer->address_id = $request->address_id;
        $employer->about = $request->about;
        $employer->founded = $request->founded;

        $employer->update();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function openingHours(Request $request)
    {
        $employer = Employer::where('id', Auth::guard('employer')->user()->id)->first();

        $request->validate([
            'monday' => 'required',
            'tuesday' => 'required',
            'wednesday' => 'required',
            'thursday' => 'required',
            'friday' => 'required',
            'saturday' => 'required',
            'sunday' => 'required',
        ]);

        $employer->hours_monday = $request->monday;
        $employer->hours_tuesday = $request->tuesday;
        $employer->hours_wednesday = $request->wednesday;
        $employer->hours_thursday = $request->thursday;
        $employer->hours_friday = $request->friday;
        $employer->hours_saturday = $request->saturday;
        $employer->hours_sunday = $request->sunday;

        $employer->update();

        return redirect()->back()->with('success', 'Opening Hours updated successfully');
    }

    public function socialLinks(Request $request)
    {
        $employer = Employer::where('id', Auth::guard('employer')->user()->id)->first();

        $request->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
        ]);

        $employer->facebook = $request->facebook;
        $employer->twitter = $request->twitter;
        $employer->github = $request->github;
        $employer->linkedin = $request->linkedin;

        $employer->update();

        return redirect()->back()->with('success', 'Social Links updated successfully');
    }

    public function contact(Request $request)
    {
        $employer = Employer::where('id', Auth::guard('employer')->user()->id)->first();

        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $employer->address = $request->address;
        $employer->city = $request->city;
        $employer->state = $request->state;
        $employer->zip = $request->zip;
        $employer->country = $request->country;

        $employer->update();

        return redirect()->back()->with('success', 'Contact updated successfully');
    }
}
