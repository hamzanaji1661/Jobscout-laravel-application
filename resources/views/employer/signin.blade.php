@extends('Frontend.layouts.master')            
@section('page_title')Employer Sign In @endsection
@section('body_content')
<div class="gray py-3">
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= Login Detail ======================== -->
<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-center">
        
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-muted mb-0">Recruiter Portal</h6>
                    <h2 class="ft-bold">Sign In To An Account</h2>
                </div>
                <form class="border p-3 rounded" method="POST" action="{{ route('employer.signin.submit') }}">
                    @if (session()->get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"> </i> {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        @endif
                        @if (session()->get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-2"> </i> {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    @csrf				
                    <div class="form-group has-validation">
                        <label>User Name *</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username*" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group has-validation">
                        <label>Password *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password*">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                <label for="dd" class="checkbox-custom-label">Remember Me</label>
                            </div>	
                            <div class="eltio_k2">
                                <a href="{{ route('employer.recover') }}">Lost Your Password?</a>
                            </div>	
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Sign In</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="{{ route('employer.signup') }}">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Login End ======================== -->

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