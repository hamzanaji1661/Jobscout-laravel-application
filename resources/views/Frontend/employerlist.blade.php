@extends('Frontend.layouts.master')
@section('page_title')Employer Details @endsection
@section('body_content')
<div class="bg-light py-5">
    <div class="ht-30"></div>
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Browse Employers</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Job</a></li>
                        <li class="breadcrumb-item active theme-cl" aria-current="page">Browse Employers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="ht-30"></div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ============================ Main Section Start ================================== -->
<section>
    <div class="container">
        <div class="row">
        
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="company-letters"><a href="#A">A</a><a href="#B">B</a><a href="#C">C</a><a href="#D">D</a><a href="#E">E</a><a href="#F">F</a><a href="#G">G</a><a href="#H">H</a><a href="#I">I</a><a href="#J">J</a><a href="#K">K</a><a href="#L">L</a><a href="#M">M</a><a href="#N">N</a><a href="#O">O</a><a href="#P">P</a><a href="#Q">Q</a><a href="#R">R</a><a href="#S">S</a><a href="#T">T</a><a href="#U">U</a><a href="#V">V</a><a href="#W">W</a><a href="#X">X</a><a href="#Y">Y</a><a href="#Z">Z</a></div>
            </div>
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                
                <ul class="company-summeries-list">
                    @foreach ($groupedData as $letter => $entries)
                    <li>
                        <div class="d-inline-flex px-4 py-2 bg-light rounded fs-xl ft-medium theme-cl mb-2">{{ $letter }}</div>
                        <ul class="cmp-overview">
                            @foreach ($entries as $entry)
                            <li><a href="{{ route('employer.details', $entry->id) }}">{{ $entry->employer_name }}</a></li>
                            @endforeach
                        </ul>	
                    </li>
                    @endforeach
                    
                    
                
                </ul>
                
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