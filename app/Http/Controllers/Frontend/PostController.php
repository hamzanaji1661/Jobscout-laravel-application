<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hiring;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('frontend.post');
    }

    public function postDetails($slug)
    {
        $blogPost = Post::where('slug',$slug)->first();

        $jobDetails = Hiring::where('isBoosted', 'yes')->inRandomOrder()->first();

        $blogPost->view_count = $blogPost->view_count + 1;
        $blogPost->update();

        return view('frontend.post', compact('blogPost', 'jobDetails'));
    }
}
