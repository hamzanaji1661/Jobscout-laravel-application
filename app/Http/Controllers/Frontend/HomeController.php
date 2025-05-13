<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItems;
use App\Models\JobCategory;
use App\Models\Location;
use App\Models\Post;
use App\Models\Employer;
use App\Models\Hiring;
use App\Models\UserTestimonial;
use App\Models\TopBar;
use DateTime;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $HomePageData = PageHomeItems::where('id', 1)->first();
        $JobCategories = JobCategory::withCount('jobcatcount')->orderBy('jobcatcount_count', 'desc')->get()->take(12);
        $JobCategoriesAll = JobCategory::get();
        $postData = Post::orderBy('id', 'desc')->take(3)->get();
        $JobLocations = Location::get();
        $employers = Employer::withCount('countEmployer')->orderBy('count_employer_count', 'desc')->get()->take(7);
        $hirings = Hiring::where('isFeatured', 'yes')->where('status', 'Published')->inRandomOrder()->take(7)->get();
        $boosted = Hiring::where('isBoosted', 'yes')->where('status', 'Published')->inRandomOrder()->take(1)->get();
        $hiringss = Hiring::where('isFeatured', 'yes')->where('status', 'Published')->inRandomOrder()->take(8)->get();
        $testimonials = UserTestimonial::where('isFeatured', 'yes')->inRandomOrder()->take(3)->get();

        //check expired boosts and jobs listings

        $boostedJobs = Hiring::with('boostingdetails')
    ->whereIn('isBoosted', ['yes'])
    ->get();

foreach ($boostedJobs as $boostedJob) {
    $latestBoostingDetail = $boostedJob->boostingdetails()
        ->latest('date_expired')
        ->first();

    if ($latestBoostingDetail) {
        $expiryDate = Carbon::parse($latestBoostingDetail->date_expired);

        if ($expiryDate < Carbon::now()) {
            $boostedJob->isBoosted = 'no';
            $boostedJob->save();
        }
    }
}
        // $i = 0;
        // $boostedJobss = Hiring::with('boostingdetails')->get();
        // foreach ($boostedJobss as $boostedJob) {
        //     // dd($boostedJob->boostingdetails[0]);
        //     $dateExpired = new DateTime($boostedJob->boostingdetails[$i]->expiry_date);
        //     if ($dateExpired > new DateTime()) {
        //         $boostedJob->isBoosted = 'yes';
        //         $boostedJob->update();
        //     }
        //     // dd();
        //     $i++;
        // }
        //check expired jobs
        $expiredJobs = Hiring::get();
        foreach ($expiredJobs as $expiredJob) {
            $dateExpired = new DateTime($expiredJob->deadline);
            if ($dateExpired < new DateTime()) {
                $expiredJob->status = 'Expired';
                $expiredJob->update();
            }
            // dd();
        }

        // dd($boostedJobs[0]->boostingdetails[0]->expiry_date);




        return view('frontend.home', compact('HomePageData', 'JobCategories', 'JobCategoriesAll', 'postData', 'JobLocations', 'employers', 'hirings', 'boosted', 'hiringss', 'testimonials'));
    }

}
