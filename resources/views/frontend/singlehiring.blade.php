@extends('Frontend.layouts.master')

@section('page_title'){{ $jobPost->title }} @endsection
@section('body_content')
<div class="bg-light rounded py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="jbd-01 d-flex align-items-center justify-content-between">
                    <div class="jbd-flex d-flex align-items-center justify-content-start">
                        <div class="jbd-01-thumb">
                            <img src="{{ asset('frontEndAssets/img').'/'. $jobPost->jobemployers->logo }}" class="img-fluid" width="100" alt="" />
                        </div>
                        <div class="jbd-01-caption pl-3">
                            <div class="tbd-title"><h4 class="mb-0 ft-medium fs-md">{{ $jobPost->title }}<img src="assets/img/verify.svg" class="ml-1" width="12" alt=""></h4></div>
                            <div class="jbl_location mb-3">
                                <span><i class="lni lni-map-marker mr-1"></i>{{ $jobPost->joblocation->name }}</span>
                                <span class="ml-3"><i class="lni lni-briefcase mr-1"></i>{{ $jobPost->jobemployers->employer_name }}</span>
                                <span class="ml-3"><i class="lni lni-money-protection mr-1"></i>{{ $jobPost->salaryrange->name }} PA</span>
                            </div>
                            <div class="jbl_info01">
                                <span class="px-2 py-1 ft-medium medium text-light theme-bg rounded mr-2">{{ $jobPost->jobtype->name }}</span>
                                @if($jobPost->isBoosted == 'no') @else<span class="px-2 py-1 ft-medium medium text-light bg-purple rounded mr-2">Boosted</span>@endif
                                @if($jobPost->isfeatured == 'no') @else<span class="px-2 py-1 ft-medium medium text-light bg-info rounded">Featured</span>@endif												
                            </div>
                        </div>
                    </div>
                    @if(!Auth::guard('employer')->check())
                    <div class="jbd-01-right text-right">
                        <div class="jbl_button mb-2"><a href="{{ route('employee.apply', $jobPost->id) }}" class="btn btn-md rounded theme-bg-light theme-cl fs-sm ft-medium">Apply This Job</a></div>
                        <div class="jbl_button"><a href="{{ route('employer.details', $jobPost->jobemployers->id) }}" class="btn btn-md rounded bg-white border fs-sm ft-medium">View Company</a></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Searchbar Banner ======================== -->

<!-- ============================ Job Details Start ================================== -->
<section class="py-5">
    <div class="container">
        <div class="row">
            
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="rounded mb-4">
                    <div class="jbd-01 pr-3">
                        <div class="jbd-details mb-4">
                            <h5 class="ft-medium fs-md">Job Description</h5>
                            <p>{{ $jobPost->description }}</p>
                        </div>
                        
                        <div class="jbd-details mb-3">
                            <h5>Requirements:</h5>
                            <div class="position-relative row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    @foreach($jobPost->requirement as $requirements)
                                    <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                        <div class="d-flex align-items-center">
                                          <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                            <i class="fas fa-check small"></i>
                                          </div>
                                          <h6 class="mb-0 ml-3 text-muted fs-sm">{{ $requirements->requirements }}</h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="jbd-details mb-4">
                            <h5 class="ft-medium fs-md">More Details</h5>
                            <div class="other-details">
                                <div class="details ft-medium"><label class="text-muted">Role</label><span class="text-dark">{{ $jobPost->title }}</span></div>
                                <div class="details ft-medium"><label class="text-muted">Industry Type</label><span class="text-dark">{{ $jobPost->jobcategory->name }}</span></div>
                                <div class="details ft-medium"><label class="text-muted">Experiance</label><span class="text-dark">{{ $jobPost->experience->name }}</span></div>
                                <div class="details ft-medium"><label class="text-muted">Employment Type</label><span class="text-dark">{{ $jobPost->jobtype->name }}, Permanent</span></div>
                                <div class="details ft-medium"><label class="text-muted">Apply Before</label><span class="text-dark">{{ date('d M Y', strtotime($jobPost->deadline)) }}</span></div>
                            </div>
                        </div>
                        
                        <div class="jbd-details mb-1">
                            <h5 class="ft-medium fs-md">Key Skills</h5>
                            @php
                            $tags = $jobPost->tags;
                            $tag_array = explode(',', $tags);
                            @endphp
                            <ul class="p-0 skills_tag text-left">
                                @foreach($tag_array as $tag)
                                <li><span class="px-2 py-1 medium skill-bg rounded text-dark">{{ $tag }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                    
                    <div class="jbd-02 pt-4 pr-3">
                        <div class="jbd-02-flex d-flex align-items-center justify-content-between">
                            @if(!Auth::guard('employer')->check())
                            <div class="jbl_button mb-2">
                                <a href="{{ route('employee.job.bookmark', $jobPost['id']) }}" class="btn btn-md rounded gray fs-sm ft-medium mr-2">Save This Job</a>
                
                                <a href="{{ route('employee.apply', $jobPost->id) }}" class="btn btn-md rounded theme-bg text-light fs-sm ft-medium">Apply Job</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Sidebar -->
            
            {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="jb-apply-form bg-white shadow rounded py-3 px-4 box-static">
                    <h4 class="ft-medium fs-md mb-3">Intrested in this job?</h4>
                    
                    <form class="_apply_form_form">
                    
                        <div class="form-group">
                            <label class="text-dark mb-1 ft-medium medium">First Name</label>
                            <input @if(Auth::guard('employer')->check()) disabled @endif type="text" class="form-control" placeholder="First Name">
                        </div>
                        
                        <div class="form-group">
                            <label class="text-dark mb-1 ft-medium medium">Your Email</label>
                            <input @if(Auth::guard('employer')->check()) disabled @endif type="email" class="form-control" placeholder="themezhub@gmail.com">
                        </div>
                        
                        <div class="form-group">
                            <label class="text-dark mb-1 ft-medium medium">Phone Number:</label>
                            <input @if(Auth::guard('employer')->check()) disabled @endif type="text" class="form-control" placeholder="+91 245 256 2548">
                        </div>
                        
                        <div class="form-group">
                            <label class="text-dark mb-1 ft-medium medium">Upload Resume:<small class="medium ft-medium">pdf, doc, docx</small></label>
                            <div class="custom-file">
                              <input @if(Auth::guard('employer')->check()) disabled @endif type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="terms_con">
                                <input @if(Auth::guard('employer')->check()) disabled @endif id="aa3" class="checkbox-custom" name="Coffee" type="checkbox">
                                <label for="aa3" class="checkbox-custom-label">I agree to pirvacy policy</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width" @if(Auth::guard('employer')->check()) disabled @endif>Apply Via Email</button>
                        </div>
                        
                    </form>
                </div>
            </div> --}}
            
        </div>
    </div>
</section>
<!-- ============================ Job Details End ================================== -->

<!-- ======================= Related Jobs ======================== -->
<section class="space min gray">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-muted mb-0">Related Jobs</h6>
                    <h2 class="ft-bold">All Related Listed jobs</h2>
                </div>
            </div>
        </div>
        
        <!-- row -->
        <div class="row align-items-center">
        @foreach($relatedJobs as $relatedJob)
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="job_grid border rounded ">
                    <div class="position-absolute ab-left"><button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button></div>
                    <div class="position-absolute ab-right"><span class="medium theme-cl theme-bg-light px-2 py-1 rounded">{{ $relatedJob->jobtype->name }}</span></div>
                    <div class="job_grid_thumb mb-3 pt-5 px-3">
                        <a href="{{ route('jobs', $relatedJob->id) }}" class="d-block text-center m-auto"><img src="{{ asset('frontEndAssets/img').'/'. $relatedJob->jobemployers->logo }}" class="img-fluid" width="70" alt="" /></a>
                    </div>
                    <div class="job_grid_caption text-center pb-5 px-3">
                        <h6 class="mb-0 lh-1 ft-medium medium"><a href="{{ route('employer.details', $relatedJob->jobemployers->id) }}" class="text-muted medium">{{ $relatedJob->jobemployers->company_name }}</a></h6>
                        <h4 class="mb-0 ft-medium medium"><a href="{{ route('jobs', $relatedJob->id) }}" class="text-dark fs-md">{{ $relatedJob->title }}</a></h4>
                        <div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{$relatedJob->joblocation->name }}</span></div>
                    </div>
                    <div class="job_grid_footer pb-4 px-3 d-flex align-items-center justify-content-between">
                        <div class="df-1 text-muted"><i class="lni lni-wallet mr-1"></i>{{ $relatedJob->salaryrange->name }} PA.</div>
                        <div class="df-1 text-muted"><i class="lni lni-timer mr-1"></i>{{ $relatedJob->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- row -->
        
    </div>
</section>
<!-- ======================= Related Jobs ======================== -->

<!-- ======================= Newsletter Start ============================ -->
<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
    <div class="container py-5">
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-light mb-0">Subscribr Now</h6>
                    <h2 class="ft-bold text-light">Get All New Job Notification</h2>
                </div>
            </div>
        </div>
        
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                <form class="bg-white rounded p-1">
                    <div class="row no-gutters">
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                            <div class="form-group mb-0 position-relative">
                                <input type="text" class="form-control lg left-ico" placeholder="Enter Your Email Address">
                                <i class="bnc-ico lni lni-envelope"></i>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                            <div class="form-group mb-0 position-relative">
                                <button class="btn full-width custom-height-lg theme-bg text-light fs-md" type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection