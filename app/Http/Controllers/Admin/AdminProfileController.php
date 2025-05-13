<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash; // The Hash facade for password hashing
use Auth; // The Auth facade for authentication

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function editProfileSubmit(Request $request)
    {
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);

        if($request->password != '')
        {
            $request->validate([
                'password'=>'required|min:6',
                'confirm_password'=>'required|same:password',
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('assets/images/users/'.$admin_data->photo));

            $ext = $request->file('photo')->extension();
            $finalName = 'adminPhoto'.'.'.$ext;

            $request->file('photo')->move(public_path('assets/images/users/'),$finalName);

            $admin_data->photo = $finalName;

        }

        
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }
}
