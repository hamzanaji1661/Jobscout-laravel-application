@extends('Frontend.layouts.masterDashboard')            
@section('page_title')#1 Job Portal Company @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
@include('Frontend.layouts.employeeDashboardNav')
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-5">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Add Resume</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="theme-cl">Add Resume</a></li>
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
                            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file mr-1 theme-cl fs-sm"></i>Create Resume</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="custom-file avater_uploads">
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile"><i class="fa fa-user"></i></label>
                                </div>
                            </div>
                            
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Your Name</label>
                                            <input type="text" class="form-control rounded" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Professional Title</label>
                                            <input type="text" class="form-control rounded" placeholder="e.g. Web Designer">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Job category</label>
                                            <select class="form-control rounded">
                                                <option value="" disabled selected>Select a Job</option>
                                                <option value="Software Company">Software Company</option>
                                                <option value="Cloud Computing">Cloud Computing</option>
                                                <option value="Logistics/Shipping">Logistics/Shipping</option>
                                                <option value="Engineering Services">Engineering Services</option>
                                                <option value="Telecom/Internet">Telecom/Internet </option>
                                                <option value="Healthcare/Pharma">Healthcare/Pharma</option>
                                                <option value="Finance/Insurance">Finance/Insurance</option>
                                                <option value="Product Software">Product Software</option>
                                                <option value="Diversified/Retail">Diversified/Retail</option>
                                                <option value="Education">Education</option>
                                                <option value="Banking/BPO">Banking/BPO</option>
                                                <option value="Printing/Packaging">Printing/Packaging</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">Email</label>
                                            <input type="email" class="form-control rounded" value="uppcl@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="text-dark ft-medium">About Content</label>
                                            <textarea class="form-control with-light" placeholder="Tell us about yourself.."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info text-light ft-medium apply-btn fs-sm rounded"></i>Save Info</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Education -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-graduation-cap mr-1 theme-cl fs-sm"></i>Education Details</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row" action="{{ route('employee.resume.create.education') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-12">
                                <div class="gray rounded p-3 mb-3 position-relative">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">School Name</label>
                                        <input type="text" name="schoolName" class="form-control rounded" placeholder="School Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Qualification</label>
                                        <input type="text" name="qualification" class="form-control rounded" placeholder="Qualification Title">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Start Date</label>
                                                <input type="date" name="startDate" class="form-control rounded" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">End Date</label>
                                                <input type="date" name="endDate" class="form-control rounded" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Note</label>
                                        <textarea class="form-control ht-80" name="details" placeholder="Note Optional"></textarea>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-info text-light ft-medium apply-btn fs-sm rounded"><i class="fas fa-plus mr-1"></i>Add Education</button>
                                </div>
                                <label class="text-dark ft-medium">Qualifications:</label>
                                    @foreach($listEducation as $education)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="row p-2">
                                                <div class="col-4">
                                                    <span class="p-3 text-white bg-purple rounded mr-3"><i class="fas fa-school"></i></span>  <strong>{{ $education->school_name }}</strong>
                                                </div>
                                            <div class="col-4">
                                                 <i class="fas fa-graduation-cap me-2"></i> {{ $education->degree }}
                                            </div>
                                            <div class="col-2">
                                                <i class="far fa-calendar me-2"></i> {{ $education->start_date }} - {{ $education->end_date }}
                                            </div>
                                            <div class="col-2 text-right">
                                                <a class="p-3 text-white bg-danger rounded mr-3"><i class="fas fa-trash"></i> Remove</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>	
        </div>	
        
        <!-- Add Experience -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-graduation-cap mr-1 theme-cl fs-sm"></i>Experience Details</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row" method="POST" action="{{ route('employee.resume.create.experience') }}">
                            @csrf
                            <div class="col-xl-12 col-lg-12">
                                <div class="gray rounded p-3 mb-3 position-relative">
                                    
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Company Name</label>
                                        <input type="text" name="companyName" class="form-control rounded" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Job Title</label>
                                        <input type="text" name="position" class="form-control rounded" placeholder="Designation Title">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Start Date</label>
                                                <input type="date" name="startDate" class="form-control rounded" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">End Date</label>
                                                <input type="date" name="endDate" class="form-control rounded" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Note</label>
                                        <textarea class="form-control ht-80" name="details" placeholder="Note Optional"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info text-light ft-medium apply-btn fs-sm rounded"><i class="fas fa-plus mr-1"></i>Add Experience</button>
                                </div>
                                <label class="text-dark ft-medium">Qualifications:</label>
                                @foreach($listExperience as $experience)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row p-2">
                                            <div class="col-4">
                                                <span class="p-3 text-white bg-purple rounded mr-3"><i class="fas fa-building"></i></span>  <strong>{{ $experience->work_name }}</strong>
                                            </div>
                                        <div class="col-4">
                                             <i class="fas fa-briefcase me-2"></i> {{ $experience->designation }}
                                        </div>
                                        <div class="col-2">
                                            <i class="far fa-calendar me-2"></i> {{ $experience->start_date }} - {{ $experience->end_date }}
                                        </div>
                                        <div class="col-2 text-right">
                                            <a class="p-3 text-white bg-danger rounded mr-3"><i class="fas fa-trash"></i> Remove</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>	
        </div>
        
        <!-- Add Skills -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-graduation-cap mr-1 theme-cl fs-sm"></i>Skills Details</h4>	
                        </div>
                    </div>
                    
                    <div class="_dashboard_content_body py-3 px-3">
                        <form class="row" method="POST" action="{{ route('employee.resume.create.skill') }}">
                            @csrf
                            <div class="col-xl-12 col-lg-12">
                                <div class="gray rounded p-3 mb-3 position-relative">
                                    <div class="form-group">
                                        <label class="text-dark ft-medium">Skills Name</label>
                                        <input type="text" class="form-control rounded" name="skillName" placeholder="Skills Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info text-light ft-medium apply-btn fs-sm rounded"><i class="fas fa-plus mr-1"></i>Add Skills</button>
                                </div>
                                <label class="text-dark ft-medium">Skills:</label>
                                @foreach($listSkill as $skills)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row p-2">
                                            <div class="col-4">
                                                <span class="p-3 text-white bg-purple rounded mr-3"><i class="fas fa-fill-drip"></i></span>  <strong>{{ $skills->skill_name }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>	
        </div>
        
        <!-- Add Skills -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Save & Preview</button>
            </div>	
        </div>
    @endsection