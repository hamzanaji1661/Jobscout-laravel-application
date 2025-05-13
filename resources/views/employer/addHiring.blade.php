@extends('Frontend.layouts.masterDashboard')
@section('page_title')Add Hiring Post @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
    @include('Frontend.layouts.employerDashboardNav')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">Post A New Job</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Post Job</a></li>
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
                                <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file mr-1 theme-cl fs-sm"></i>Post Job</h4>	
                            </div>
                        </div>
                        
                        <div class="_dashboard_content_body py-3 px-3">
                            <form class="row" method="post" action="{{ route('employer.hiring.add') }}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="row">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Title*</label>
                                                <input type="text" name="title" class="form-control rounded  @error('title') is-invalid @enderror" placeholder="Title">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Description*</label>
                                                <textarea class="form-control rounded  @error('description') is-invalid @enderror" name="description" placeholder="Job Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Requirements*</label>
                                                <div class="dynamic-wrap">
                                                      <div class="entry input-group">
                                                        <input class="form-control mb-2  @error('fields[]') is-invalid @enderror" name="fields[]" type="text" placeholder="Type something" />
                                                        <span class="input-group-btn">
                                                          <button class="btn btn-success btn-add mb-2" style="padding: 15px;" type="button">
                                                                  <span class="lni lni-plus"></span>
                                                          </button>
                                                        </span>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Category*</label>
                                                <select name="category" class="form-control rounded @error('category') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                    @foreach ($JobCategory as $item)
                                                
                                                            <option value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Location*</label>
                                                <select name="location" class="form-control rounded @error('location') is-invalid @enderror">
                                                    <option value="">Select Location</option>
                                                    @foreach ($Location as $item)
                                                
                                                    <option value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Type*</label>
                                                <select name="type" class="form-control rounded @error('type') is-invalid @enderror">
                                                    <option value="">Select Job Type</option>
                                                    @foreach ($JobType as $item)
                                                
                                                    <option value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Location*</label>
                                                <select class="form-control rounded">
                                                    <option>Begginer</option>
                                                    <option>Junior</option>
                                                    <option>Manager</option>
                                                    <option>Team leader</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Salary Range*</label>
                                                <select name="salary" class="form-control rounded @error('salary') is-invalid @enderror">
                                                    <option value="">Salary Range</option>
                                                    @foreach ($SalaryRange as $item)
                                                
                                                    <option value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Experience*</label>
                                                <select name="experiance" class="form-control rounded @error('experiance') is-invalid @enderror">
                                                    <option value="">Select Experience</option>
                                                    @foreach ($Experience as $item)
                                                
                                                    <option value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Qualification*</label>
                                                <select name="education" class="form-control rounded @error('education') is-invalid @enderror">
                                                    <option value="Select Qualification"></option>
                                                    <option value="Baccalaureat">Baccalaureat</option>
                                                    <option value="Baccalaureat+2">Baccalaureat + 2</option>
                                                    <option value="License">License</option>
                                                    <option value="Master">Master</option>
                                                    <option value="Doctorat">Doctorat</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Gender*</label>
                                                <select name="gender" class="form-control rounded">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="All Gender">All Gender</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Application Deadline*</label>
                                                <input type="date" name="deadline" class="form-control rounded" placeholder="dd-mm-yyyy">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Tags</label>
                                                <input type="text" name="tag" class="form-control rounded" data-role="tagsinput" placeholder="WordPress, Joomla, PHP">
                                                <sub>Please add tags separated with a comma, e.g. WordPress, Joomla, PHP.</sub>
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Latitude</label>
                                                <input type="text" class="form-control" placeholder="Liverpool" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Longitude</label>
                                                <input type="text" class="form-control" placeholder="Liverpool" />
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Status*</label>
                                                <select name="status" class="form-control rounded">
                                                    <option value="Published">Publish</option>
                                                    <option value="Draft">Draft</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="hidden" name="token" value="{{ uniqid() }}">
                                                <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Publish Job</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
