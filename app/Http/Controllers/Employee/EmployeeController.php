<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeApplication;
use App\Models\Hiring;
use App\Models\EmployeeBookmark;
use App\Models\ActivityLog;
use App\Mail\WebsiteMailController; // The WebMail class for sending emails
use Auth;
use App\Models\Employee;
use Illuminate\Support\Str;
use Orhanerday\OpenAi\OpenAi;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }

    public function index()
    {
        $appliedJobs = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->count();
        $bookmarkedJobs = EmployeeBookmark::where('employee_id', Auth::guard('employee')->user()->id)->count();
        $approvedJobs = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->where('status', 'approved')->count();
        $rejectrdJobs = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->where('status', 'rejected')->count();
        $activityLog = ActivityLog::where('initiator_id', Auth::guard('employee')->user()->id)
        ->where('initiator_type', 'employee')
        ->orderBy('id', 'DESC')
        ->limit(12)
        ->get();

        return view('employee.dashboard', compact('appliedJobs', 'bookmarkedJobs', 'approvedJobs', 'rejectrdJobs', 'activityLog') );
    }

    public function apply($id)
    {

        $applicationcheck = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->where('job_id', $id)->count();
        if($applicationcheck > 0){
            return redirect()->back()->with('error', 'You have already applied for this job');
        }
        $jobDetails = Hiring::where('id', $id)->first();
        return view('Frontend.application', compact('id', 'jobDetails', 'applicationcheck'));
    }

    public function applyConfirm(Request $request, $id)
    {
        $jobDetails = Hiring::where('id', $id)->first();

        $jobDetailsAppendBIO = $jobDetails->description . $jobDetails->tags .  $jobDetails->education;

        $userInfo = Employee::where('id', Auth::guard('employee')->user()->id)->first();

        $userInfoAppendBIO = $userInfo->bio . $userInfo->skills . $userInfo->education;

        $FinalScore = round(mt_rand(40, 100) / 100, 2) * 100;
        
        $request->validate([
            'coverletter' => 'required',
        ]);
        $applicationcheck = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->where('job_id', $id)->count();
        $applicationchecks = EmployeeApplication::where('employee_id', Auth::guard('employee')->user()->id)->where('job_id', $id)->first();
        if($applicationcheck == 0){
            $apply = new EmployeeApplication();
            $apply->employee_id = Auth::guard('employee')->user()->id;
            $apply->job_id = $id;
            $apply->cover_letter =  $request->coverletter;
            $apply->status = 'Applied';
            $apply->similarityScore = $FinalScore;
            $apply->save();
        }
        $checkJob = route('employee.job.applied');
        $subject = 'Job Application Status Update';
        $message = $checkJob;
        $fullname = Auth::guard('employee')->user()->first_name.' '.Auth::guard('employee')->user()->last_name;
        $useremail = Auth::guard('employee')->user()->email;
        \Mail::to($useremail)->send(new WebsiteMailController($subject, $message, 'admin.email.successfullyApplied', ['employer_name' => $fullname]));

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'Windows') !== false) {
            $os = "Windows";
        } elseif (strpos($user_agent, 'Mac') !== false) {
            $os = "Mac";
        } elseif (strpos($user_agent, 'Linux') !== false) {
            $os = "Linux";
        } elseif (strpos($user_agent, 'Android') !== false) {
            $os = "Android";
        } elseif (strpos($user_agent, 'iOS') !== false) {
            $os = "iOS";
        } else {
            $os = "Unknown";
        }
        

        
    

        if (strpos($user_agent, 'Edge') !== false) {
            $browser = "Microsoft Edge";
        } elseif (strpos($user_agent, 'Firefox') !== false) {
            $browser = "Firefox";
        } elseif (strpos($user_agent, 'Chrome') !== false) {
            $browser = "Chrome";
        } elseif (strpos($user_agent, 'Safari') !== false) {
            $browser = "Safari";
        } elseif (strpos($user_agent, 'Opera') !== false) {
            $browser = "Opera";
        } elseif (strpos($user_agent, 'IE') !== false) {
            $browser = "Internet Explorer";
        } else {
            $browser = "Unknown";
        }
        
        $activityLog = new ActivityLog();
        $activityLog->initiated_by = Auth::guard('employee')->user()->firstname.' '.Auth::guard('employee')->user()->lastname;
        $activityLog->activity = 'Applied for a job - <a href="'.route('jobs', $id).'">'. $jobDetails->title .'</a>';
        $activityLog->activity_on = date('Y-m-d H:i:s');
        $activityLog->activity_type = 'apply';
        $activityLog->activity_from_ip = $ip;
        $activityLog->activity_from = $browser . ' on ' . $os;
        $activityLog->initiator_id = Auth::guard('employee')->user()->id;
        $activityLog->initiator_type = 'employee';
        $activityLog->save();
        


        
        return redirect()->route('employee.dashboard')->with('success', 'You have successfully applied for this job');
    }

    public function addBookmark($id)
    {
        $bookmarkCheck = EmployeeBookmark::where('employee_id', Auth::guard('employee')->user()->id)->where('job_id', $id)->count();
        if($bookmarkCheck == 0){
            $bookmark = new EmployeeBookmark();
            $bookmark->employee_id = Auth::guard('employee')->user()->id;
            $bookmark->job_id = $id;
            $bookmark->save();
        }
        else{
            return redirect()->back()->with('error', 'Job has already been added to your bookmark');
            }
        return redirect()->back()->with('success', 'Job has been added to your bookmark');
    }

    public function checkBookmark()
    {
        $bookmarks = EmployeeBookmark::where('employee_id', Auth::guard('employee')->user()->id)->get();
        return view('employee.bookmarks', compact('bookmarks'));
    }

    public function deleteBookmark($id)
    {
        $bookmark = EmployeeBookmark::where('employee_id', Auth::guard('employee')->user()->id)->where('id', $id)->first();
        //dd($bookmark);
        $bookmark->delete();
        return redirect()->back()->with('success', 'Job has been removed from your bookmark');
    }


    public function updateProfile(Request $request)
    {
        $employee = Employee::where('id', Auth::guard('employee')->user()->id)->first();
        return view('employee.updateprofile', compact('employee'));
    }

    public function updateProfileConfirm(Request $request)
    {
        $employee = Employee::where('id', Auth::guard('employee')->user()->id)->first();
        //dd($request->all());
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "phone" => "required|numeric|digits_between:9,10",
            "country" => "required",
            "state" => "required",
            "city" => "required",
            "address" => "required",
            "mstatus" => "required",
            "dateofbirth" => "required",
            "website" => "required"
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if ($employee->photo != null) {
                // Delete the default photo
                unlink(public_path('frontEndAssets/img/'.$employee->photo));
              }
              $randomString = bin2hex(random_bytes(16)); // Generate a random string of 16 bytes
              $hash = hash('sha256', $randomString); // Hash the random string using SHA-256

            $ext = $request->file('photo')->extension();
            $finalName = $hash.'_userphoto'.'.'.$ext;

            $request->file('photo')->move(public_path('frontEndAssets/img/'),$finalName);

            $employee->photo = $finalName;

        }

        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->phone = $request->phone;
        $employee->country = $request->country;
        $employee->state = $request->state;
        $employee->city = $request->city;
        $employee->address = $request->address;
        $employee->isMarried = $request->mstatus;
        $employee->dateOfBirth = $request->dateofbirth;
        $employee->website = $request->website;
        $employee->bio = $request->bio;
        $employee->update();

        return redirect()->back()->with('success', 'Profile has been updated successfully');
    }

    public function updateProfileSocial(Request $request)
    {

        $employee = Employee::where('id', Auth::guard('employee')->user()->id)->first();
        $employee->facebook = $request->facebook;
        $employee->twitter = $request->twitter;
        $employee->linkedin = $request->linkedin;
        $employee->github = $request->github;
        $employee->update();

        return redirect()->back()->with('success', 'Social links has been updated successfully');
    }

    public function terminateEmployee($id)
    { //update names and other details instead of deleting
      
        $employee = Employee::where('id', $id)->first();
        $employee->firstname = 'Deleted';
        $employee->lastname = 'User';
        $employee->email = Str::random(10).'@gmail.com';
        $employee->phone = '0000000000';
        $employee->country = 'Unknown';
        $employee->state = 'Unknown';
        $employee->city = 'Unknown';
        $employee->address = 'Unknown';
        $employee->isMarried = 'Unknown';
        $employee->dateOfBirth = 'Unknown';
        $employee->website = 'Unknown';
        $employee->bio = 'Unknown';
        $employee->facebook = 'Unknown';
        $employee->twitter = 'Unknown';
        $employee->linkedin = 'Unknown';
        $employee->github = 'Unknown';
        $employee->update();

        Auth::guard('employee')->logout();

        // Redirect to the employer signin page.
        return redirect()->route('employee.signin')->with('success', 'Employee has been deleted successfully');;
        
    }

   
}
