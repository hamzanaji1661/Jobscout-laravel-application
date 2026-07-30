@extends('Frontend.layouts.master')
@section('page_title')Search Jobs @endsection
@section('body_content')
<div class="py-5 theme-bg" data-overlay="0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12">
                <div class="banner_caption text-center mb-2">
                    <h1 class="ft-bold mb-4">The Most Exciting Jobs</h1>
                </div>
                
                <form class="bg-white rounded p-1" method="GET" action="{{ url('jobs') }}">
                    <div class="row no-gutters">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="form-group mb-0 position-relative">
                                <input type="text" class="form-control lg left-ico" name="jobs" placeholder="Job Title, Keyword or Company" />
                                <i class="bnc-ico lni lni-search-alt"></i>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group mb-0 position-relative">
                             <select name="location" class="custom-select lg b-0 left-ico">
                                <option value="">Select Location</option>
                                @foreach ($locations as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                                <i class="bnc-ico lni lni-target"></i>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-12">
                            <div class="form-group mb-0 position-relative">
                                <button class="btn full-width custom-height-lg bg-dark text-white fs-md" type="submit">Find Job</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- ======================= Searchbar Banner ======================== -->


<!-- ======================= Filter Wrap Style 1 ======================== -->
<section class="py-2 br-bottom br-top">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                <h6 class="mb-0 ft-medium fs-sm">{{ $hirings->count() }} New Jobs Found</h6>
            </div>
            
            {{-- <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                <div class="filter_wraps elspo_wrap d-flex align-items-center justify-content-end">
                    <div class="single_fitres mr-2 br-right">
                        <select class="custom-select simple">
                          <option value="1" selected="">Default Sorting</option>
                          <option value="2">Recent jobs</option>
                          <option value="3">Featured jobs</option>
                          <option value="4">Trending Jobs</option>
                          <option value="5">Premium jobs</option>
                        </select>
                    </div>
                    <div class="single_fitres">
                        <a href="job-search-v1.html" class="simple-button mr-1"><i class="ti-layout-grid2"></i></a>
                        <a href="job-list-v1.html" class="simple-button active theme-cl"><i class="ti-view-list"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
        
    </div>
</section>
<!-- ============================= Filter Wrap ============================== -->

<!-- ============================ Main Section Start ================================== -->
<section class="bg-light" style="padding: 50px 0 80px !important;">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="bg-white rounded mb-4">							
                
                    <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                        <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                        <div class="ssh-header">
                            <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                            <a href="#search_open" data-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                        </div>
                    </div>
                    
                    <!-- Find New Property -->
                    <div class="sidebar-widgets collapse miz_show" id="search_open" data-parent="#search_open">
                        
                        <div class="search-inner">
                            <form method="GET" action="{{ url('jobs') }}">
                            
                            <div class="filter-search-box px-4 pt-3 pb-0">
                                <div class="form-group">
                                    <input type="text" name="jobs" class="form-control" placeholder="Search by keywords..." value="{{ $hiringQuery }}">
                                </div>
                                <select name="location" class="custom-select mb-3">
                                    <option value="">Select Location</option>
                                    @foreach($locations as $item)
                                    <option @if($hiringLocation == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                             </select>
                            </div>
                            
                            <div class="filter_wraps">
                                 {{-- Job categories Search  --}}
                                 <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#category" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0  @if($hiringCategory == null) collapsed @endif" @if($hiringCategory != null) expanded="true" @endif>Job Category</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse  @if($hiringCategory != null) show @endif" id="category" data-parent="#category">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            <li>
                                                                @php
                                                                    $count = 1;
                                                                @endphp
                                                                @foreach($categories as $item)
                                                                
                                                                <input id="e{{ $count }}" @if($hiringCategory == $item->id) checked @endif  class="radio-custom" value="{{ $item->id }}" name="category" type="radio">
                                                                <label for="e{{ $count }}" class="radio-custom-label">{{ $item->name }}</label>
                                                                @php
                                                                   $count ++;
                                                                @endphp
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                
                                {{-- Job Skills Search  --}}
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#jobtype" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed  @if($hiringType == null) collapsed @endif" @if($hiringType != null) expanded="true" @endif>Job Type</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse @if($hiringType != null) show @endif" id="jobtype" data-parent="#jobtype">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            @php
                                                                $count = 1;
                                                            @endphp
                                                            @foreach($jobtype as $item)
                                                            <li>
                                                                <input id="ea{{ $count }}" @if($hiringType == $item->id) checked @endif class="radio-custom" value="{{ $item->id }}" name="jobtype" type="radio">
                                                                <label for="ea{{ $count }}" class="radio-custom-label">{{ $item->name }}</label>
                                                            </li>
                                                            @php
                                                                $count ++;
                                                            @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                {{-- Experience Search --}}
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#salary" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed @if($hiringSalary == null) collapsed @endif" @if($hiringSalary != null) expanded="true" @endif>Expected Salary</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse  @if($hiringSalary != null) show @endif" id="salary" data-parent="#salary">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            @php
                                                                $count = 1;
                                                            @endphp
                                                            @foreach($salaryrange as $item)
                                                            <li>
                                                                <input id="eb{{ $count }}" @if($hiringSalary == $item->id) checked @endif class="radio-custom" value="{{ $item->id }}" name="salaryrange" type="radio">
                                                                <label for="eb{{ $count }}" class="radio-custom-label">{{ $item->name }}</label>
                                                            </li>
                                                            @php
                                                                $count ++;
                                                            @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job types Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#experience" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed @if($hiringExperience == null) collapsed @endif" @if($hiringExperience != null) expanded="true" @endif>Experience</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse  @if($hiringExperience != null) show @endif" id="experience" data-parent="#experience">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            @php
                                                                $count = 1;
                                                            @endphp
                                                            @foreach($experience as $item)
                                                            <li>
                                                                <input id="ec{{ $count }}" @if($hiringExperience == $item->id) checked @endif value="{{ $item->id }}" class="radio-custom" name="experience" type="radio">
                                                                <label for="ec{{ $count }}" class="radio-custom-label">{{ $item->name }}</label>
                                                            </li>
                                                            @php
                                                                $count ++;
                                                            @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group filter_button pt-2 pb-4 px-4">
                                <button type="submit" class="btn btn-md theme-bg text-light rounded full-width">Filter Results</button>
                            </div>
                        </div>							
                    </div>
                </div>
                <!-- Sidebar End -->
            </form>
            </div>
            
            <!-- Item Wrap Start -->
            <div class="col-lg-8 col-md-12 col-sm-12">
            
                <!-- row -->
                <div class="row align-items-center">

                    @if(!$hirings->count())
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-center border rounded">
                                <div class="rounded bg-white px-3 py-3">
                                    <div class=" rounded bg-white text-center">
                                      <img src="{{ asset('frontEndAssets/img/nosearch.svg') }}" class="mx-auto d-block" width="350" alt="No Result Found"><h1>Opps!! No Jobs Found</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else

                    @foreach($hirings as $hiring)

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="jbr-wrap text-left border rounded">
                            <div class="cats-box mlb-res rounded bg-white d-flex align-items-center justify-content-between px-3 py-3">
                                <div class="cats-box rounded bg-white d-flex align-items-center">
                                    <div class="text-center"><img src="{{ asset('frontEndAssets/img').'/'. $hiring->jobemployers->logo }}" class="img-fluid" width="55" alt=""></div>
                                    <div class="cats-box-caption px-2">
                                        <h4 class="fs-md mb-0 ft-medium">{{ $hiring->title }}</h4>
                                        <div class="d-block mb-2 position-relative">
                                            <span class="text-muted medium"><i class="lni lni-map-marker mr-1"></i>{{ $hiring->joblocation->name }}</span>
                                            <span class="muted medium ml-2 theme-cl"><i class="lni lni-briefcase mr-1"></i>{{ $hiring->jobtype->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mlb-last"><a href="{{ route('jobs', $hiring->id) }}" class="btn gray ft-medium apply-btn fs-sm rounded">View Details<i class="lni lni-arrow-right-circle ml-1"></i></a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    
                    @endif

                    {{ $hirings->appends($_GET)->links() }}
                </div>
                <!-- row -->
                
                {{-- <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span class="fas fa-arrow-circle-right"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">18</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span class="fas fa-arrow-circle-right"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                
            </div>
            
        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->

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