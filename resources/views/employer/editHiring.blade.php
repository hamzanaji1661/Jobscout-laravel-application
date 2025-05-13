@extends('Frontend.layouts.masterDashboard')
@section('page_title')Edit Hiring Post @endsection
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
                            <form class="row" method="post" action="{{ route('employer.hiring.update', $hiring->id) }}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="row">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Title*</label>
                                                <input type="text" name="title" class="form-control rounded  @error('title') is-invalid @enderror" placeholder="Title" value="{{ $hiring->title }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Description*</label>
                                                <textarea class="form-control rounded  @error('description') is-invalid @enderror" name="description" placeholder="Job Description">{{ $hiring->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Requirements*</label>
                                                @foreach($hiring->requirement as $requirement)
                                                <div class="dynamic-wraps">
                                                      <div class="entry input-group">
                                                        <input disabled class="form-control mb-2   @error('fieldsUpdate[]') is-invalid @enderror" name="fieldsUpdate[]" type="text" placeholder="Type something"  value="{{ $requirement->requirements }}"/>
                                                        <span class="input-group-btn">     
                                                          <a href="{{ route('employer.requirement.delete', $requirement->id, $hiring->id) }}" class="btn btn-danger mb-2" style="padding: 15px;">
                                                                  <span class="lni lni-trash-can"></span>
                                                          </a></form>
                                                        </span>
                                                      </div>
                                                </div>
                                                @endforeach
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
                                                
                                                            <option @if($hiring->category == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>

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
                                                
                                                    <option @if($hiring->location == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>

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
                                                
                                                    <option @if($hiring->type == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Job Location*</label>
                                                <select class="form-control rounded">
                                                    <option @if($hiring->category == "Begginer") selected @endif>Begginer</option>
                                                    <option @if($hiring->category == "Junior") selected @endif>Junior</option>
                                                    <option @if($hiring->category == "Manager") selected @endif>Manager</option>
                                                    <option @if($hiring->category == "Team leader") selected @endif>Team leader</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Salary Range*</label>
                                                <select name="salary" class="form-control rounded @error('salary') is-invalid @enderror">
                                                    <option value="">Web Designing</option>
                                                    @foreach ($SalaryRange as $item)
                                                
                                                    <option @if($hiring->salary == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>

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
                                                
                                                    <option @if($hiring->experiance == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Qualification*</label>
                                                <select name="education" class="form-control rounded @error('education') is-invalid @enderror">
                                                    <option value="">Select Qualification</option>
                                                    <option @if($hiring->education == "Graduation") selected @endif value="Graduation">Graduation</option>
                                                    <option @if($hiring->education == "Master Degree") selected @endif value="Master Degree">Master Degree</option>
                                                    <option @if($hiring->education == "BPharma") selected @endif value="BPharma">BPharma</option>
                                                    <option @if($hiring->education == "P.H.D") selected @endif value="P.H.D">P.H.D.</option>
                                                    <option @if($hiring->education == "Other") selected @endif value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Gender*</label>
                                                <select name="gender" class="form-control rounded">
                                                    <option @if($hiring->gender == "Male") selected @endif value="Male">Male</option>
                                                    <option @if($hiring->gender == "Female") selected @endif value="Female">Female</option>
                                                    <option @if($hiring->gender == "All Gender") selected @endif value="All Gender">All Gender</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Application Deadline*</label>
                                                <input type="date" name="deadline" class="form-control rounded" placeholder="dd-mm-yyyy" value="{{ $hiring->deadline }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark ft-medium">Tags</label>
                                                <input type="text" name="tag" class="form-control rounded" data-role="tagsinput" placeholder="WordPress, Joomla, PHP" value="{{ $hiring->tags }}">
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
                                                    <option @if($hiring->status == "Published") selected @endif value="Published">Publish</option>
                                                    <option @if($hiring->status == "Draft") selected @endif value="Draft">Draft</option>
                                                    <option @if($hiring->status == "Inactive") selected @endif value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="hidden" name="token" value="{{ $hiring->token }}">
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
