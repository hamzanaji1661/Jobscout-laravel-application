<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $blogPosts = Post::get();
        return view('admin.listBlogPosts', compact('blogPosts'));
    }

    public function create()
    {
        return view('admin.blogPosts');
    }

    public function createSubmit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|alpha_dash',
            'category' => 'required',
            'tags' => 'required',
            'status' => 'required'
        ]);

        $blogPost = new Post();

        if($request->hasFile('image'))
        {
            $request->validate([
                'image'=>'image|mimes:jpg,jpeg,png,gif'
            ]);

            $ext = $request->file('image')->extension();
            $finalName = 'blogPost'.time().'.'.$ext;

            $request->file('image')->move(public_path('frontEndAssets/img/'),$finalName);

            $blogPost->image = $finalName;
        }
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->slug = $request->slug;
        $blogPost->category = $request->category;
        $blogPost->tags = $request->tags;
        $blogPost->status = $request->status;
        $blogPost->view_count = 0;
        $blogPost->save();

        return redirect()->back()->with('success', 'Blog Post Created Successfully');
    }

    public function edit($id)
    {
        $postSingle = Post::where('id', $id)->first();
        return view('admin.editpost', compact('postSingle'));
    }

    public function editSubmit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|alpha_dash',
            'category' => 'required',
            'tags' => 'required',
            'status' => 'required'
        ]);

        $blogPost = Post::where('id', $id)->first();

        if($request->hasFile('image'))
        {
            $request->validate([
                'image'=>'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('frontEndAssets/img/'.$blogPost->image));

            $ext = $request->file('image')->extension();
            $finalName = 'blogPost'.time().'.'.$ext;

            $request->file('image')->move(public_path('frontEndAssets/img/'),$finalName);

            $blogPost->image = $finalName;
        }
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->slug = $request->slug;
        $blogPost->category = $request->category;
        $blogPost->tags = $request->tags;
        $blogPost->status = $request->status;
        $blogPost->update();

        return redirect()->back()->with('success', 'Blog Post Updated Successfully');
    }

    public function delete($id)
    {
        $blogPost = Post::where('id', $id)->first();
        unlink(public_path('frontEndAssets/img/'.$blogPost->image));
        $blogPost->delete();
        return redirect()->back()->with('success', 'Blog Post Deleted Successfully');
    }
}
