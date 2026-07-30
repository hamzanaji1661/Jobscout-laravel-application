@extends('Frontend.layouts.master')
@section('page_title')Employer Details @endsection
@section('body_content')
<div class="bg-light py-5">
    <div class="ht-30"></div>
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Employer Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Employer</a></li>
                        <li class="breadcrumb-item active theme-cl" aria-current="page">Employer Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="ht-30"></div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= Dashboard Detail ======================== -->
<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-between">
        
            <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
                <div class="d-block border rounded mfliud-bot mb-4">
                    <div class="cdt_author px-2 pt-5 pb-4">
                        <div class="dash_auth_thumb rounded p-1 border d-inline-flex mx-auto mb-3">
                            <img src="{{ asset('frontEndAssets/img').'/'. $employer->logo }}" class="img-fluid" width="100" alt="" />
                        </div>
                        <div class="dash_caption mb-4">
                            <h4 class="fs-lg ft-medium mb-0 lh-1">{{ $employer->employer_name }}</h4>
                            <span class="text-muted smalls"><i class="lni lni-map-marker mr-1"></i>@if(!empty($employer->getLocations->name)) {{ $employer->getLocations->name }} @else Not Updated @endif</span>
                        </div>
                        {{-- <div class="jb-list-01-title px-2">
                            <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded theme-cl theme-bg-light">Photoshop</span>
                            <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded text-warning bg-light-warning">WordPress</span>
                            <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded text-danger bg-light-danger">Magento</span>
                            <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded text-info bg-light-info">CSS3</span>
                            <span class="px-2 mb-2 d-inline-flex py-1 rounded text-purple bg-light-purple">HTML5</span>
                        </div> --}}
                    </div>
                    
                    <div class="cdt_caps">
                        <div class="job_grid_footer pb-3 px-3 d-flex align-items-center justify-content-between">
                            <div class="df-1 text-muted"><i class="lni lni-briefcase mr-1"></i>{{ $hiring }} Openings</div>
                            <div class="df-1 text-muted"><i class="lni lni-laptop-phone mr-1"></i>{{ $employer->employer_type }}</div>
                        </div>	
                        <div class="job_grid_footer px-3 d-flex align-items-center justify-content-between">
                            <div class="df-1 text-muted"><i class="lni lni-envelope mr-1"></i>{{ $employer->email }}</div>
                            <div class="df-1 text-muted"><i class="lni lni-calendar mr-1"></i>Build {{ $employer->founded }}</div>
                        </div>
                    </div>
                    
                    <div class="cdt_caps py-5 px-3">
                        <a href="#" class="btn btn-md theme-bg text-light rounded full-width">Contact Company</a>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-12 col-md-12 col-lg-8 col-xl-8">
            
                <!-- row -->
                <div class="row align-items-start">
                    
                    <!-- About -->
                    <div class="abt-cdt d-block full-width mb-4">
                        <h4 class="ft-medium mb-1 fs-md">About {{ $employer->employer_name }}</h4>
                        @if($employer->about == null)
                        <p>About Info Not Updated.</p>
                        @else
                        {!! $employer->about !!}
                        @endif
                    </div>
                    
                    <!-- Hobbies -->
                    {{-- <div class="abt-cdt d-block full-width mb-4">
                        <h4 class="ft-medium mb-1 fs-md">Instructions</h4>
                        <div class="position-relative row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Strong core PHP Hands on experience.</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Strong Expertise in CodeIgniter Framework .</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Understanding of MVC design pattern.</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Expertise in PHP, MVC Frameworks and good technology exposure of Codeigniter .</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Basic understanding of front-end technologies, such as JavaScript, HTML5, and CSS3</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Good knowledge of relational databases, version control tools and of developing web services.</h6>
                                    </div>
                                </div>
                                <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                    <div class="d-flex align-items-center">
                                      <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check small"></i>
                                      </div>
                                      <h6 class="mb-0 ml-3 text-muted fs-sm">Proficient understanding of code versioning tools, such as Git.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <!-- Award -->
                    <div class="abt-cdt d-block full-width mb-4">
                        <h4 class="ft-medium mb-1 fs-md">Award</h4>
                        <div class="exslio-list mt-3">
                            <ul>
                            @foreach($EmployerAward as $award)
                                <li>
                                    <div class="esclio-110 bg-light rounded px-3 py-3">
                                        <h4 class="mb-0 ft-medium fs-md">{{ $award->award_name }}</h4>
                                        <div class="esclio-110-info full-width mb-2">
                                            <span class="text-muted mr-2"><i class="lni lni-calendar mr-1"></i>{{ $award->award_year }}</span>
                                        </div>
                                        <div class="esclio-110-decs full-width">
                                            <p>{{ $award->award_description }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!-- row -->
                
            </div>
            
        </div>
    </div>
</section>
<!-- ======================= Dashboard Detail End ======================== -->

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