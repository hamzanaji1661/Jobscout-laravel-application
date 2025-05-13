@extends('Frontend.layouts.masterDashboard')            
@section('page_title')#1 Job Portal Company @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
@include('Frontend.layouts.employeeDashboardNav')
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-5">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">My Profile</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="theme-cl">My Profile</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user mr-1 theme-cl fs-sm"></i>My Account</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row" method="post" action="{{ route('employee.profile.edit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="custom-file avater_uploads">
                                  <input type="file" class="custom-file-input" name="photo" onchange="previewImage();" id="file-input">
                                  
                                  @if(Auth::guard('employee')->user()->photo == null)
                                  
                                  <img class="custom-file-label" for="file-input" id="image-preview" style="width: 200px; height: 200px;" src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-3.jpg" alt="">
                                  @else
                                  <img class="custom-file-label" for="file-input" id="image-preview" style="width: 200px; height: 200px;" src="{{ asset('frontEndAssets/img/'.Auth::guard('employee')->user()->photo) }}" alt="">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">First Name*</label>
                                            <input type="text" class="form-control rounded" name="firstname" placeholder="First Name" value="{{ $employee->firstname }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Last Name*</label>
                                            <input type="text" class="form-control rounded" name="lastname" placeholder="Last Name" value="{{ $employee->lastname }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Phone*</label>
                                            <input type="number" class="form-control rounded" name="phone" placeholder="Phone" value="{{ $employee->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Email*</label>
                                            <input type="text" class="form-control rounded" placeholder="exmple@gmail.com" value="{{ $employee->email }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Country*</label>
                                            <input type="text" class="form-control rounded" name="country" placeholder="Country Name" value="{{ $employee->country }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">State*</label>
                                            <input type="text" class="form-control rounded" name="state" placeholder="State/Province Name" value="{{ $employee->state }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">City*</label>
                                            <input type="text" name="city" class="form-control rounded" placeholder="City Name" value="{{ $employee->city }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Address*</label>
                                            <input type="text" name="address" class="form-control rounded" placeholder="Full Address" value="{{ $employee->address }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Marital Status*</label>
                                            <select name="mstatus" class="custom-select rounded">
                                                <option value=" ">Select Status</option>
                                                <option @if($employee->isMarried == "Single") Selected @endif value="Single">Single</option>
                                                <option @if($employee->isMarried == "Married") Selected @endif value="Married">Married</option>
                                                <option @if($employee->isMarried == "Divorced") Selected @endif value="Divorced">Divorced</option>
                                                <option @if($employee->isMarried == "Widowed") Selected @endif value="Widowed">Widowed</option>
                                                <option @if($employee->isMarried == "Prefer Not To Say") Selected @endif value="Prefer Not To Say">Prefer Not To Say</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Date Of Birth*</label>
                                            <input type="date" name="dateofbirth" onchange="calculateAge();" id="dob" class="form-control rounded" value="{{ $employee->dateOfBirth }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Age</label>
                                            <input type="text" id="age" disabled class="form-control rounded" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Website*</label>
                                            <input type="text" name="website" class="form-control rounded" placeholder="example.com" value="{{ $employee->website }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">About Info (Optional)</label>
                                            <textarea name="bio" class="form-control with-light">{{ $employee->bio }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="ti-facebook mr-1 theme-cl fs-sm"></i>Social Accounts</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row" method="post" action="{{ route('employee.profile.social.edit') }}">
                            @csrf
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark ft-medium">Facebook</label>
                                    <input type="text" name="facebook" class="form-control rounded" placeholder="https://www.facebook.com/" value="{{ $employee->facebook }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark ft-medium">Twitter</label>
                                    <input type="text" name="twitter" class="form-control rounded" placeholder="https://www.twitter.com/" value="{{ $employee->twitter }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark ft-medium">LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control rounded" placeholder="https://www.linkedin.com/" value="{{ $employee->linkedin }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark ft-medium">GitHub</label>
                                    <input type="text" name="github" class="form-control rounded" placeholder="https://www.github.com/" value="{{ $employee->github }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Save Changes</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>	
            
    </div>

    <script>

var today = new Date();
var maxDOB = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

document.getElementById("dob").setAttribute("max", maxDOB.toISOString().split('T')[0]);

var dob = new Date(document.getElementById("dob").value);
  var today = new Date();
  var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000)); // Calculate age in years

  document.getElementById("age").value = age + " Years Old";

function calculateAge() {
  var dob = new Date(document.getElementById("dob").value);
  var today = new Date();
  var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000)); // Calculate age in years

  document.getElementById("age").value = age + " Years Old";
}
    </script>

<script>
    function previewImage() {
        var preview = document.querySelector('#image-preview');
        var file = document.querySelector('#file-input').files[0];  
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>

@endsection