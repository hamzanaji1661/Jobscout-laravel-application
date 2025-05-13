@extends('Frontend.layouts.master')            
@section('page_title')Employee Sign Up @endsection
@section('body_content')
<!-- ======================= Top Breadcrubms ======================== -->
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
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-muted mb-0">Candidate Portal</h6>
                    <h2 class="ft-bold">Register To An Account</h2>
                </div>
                <form class="border p-3 rounded" method="POST" action="{{ route('employee.signup.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group has-validation col-md-6">
                            <label>First Name *</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
                            @error('firstname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group has-validation col-md-6">
                            <label>Last Name *</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
                            @error('lastname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group has-validation">
                        <label>Username *</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username*" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group has-validation">
                        <label>Email *</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address*" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    
                    <div class="row">
                        <div class="form-group has-validation col-md-6">
                            <label>Password *</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password*">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        
                        <div class="form-group has-validation col-md-6">
                            <label>Confirm Password *</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" placeholder="Confirm Password*">
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <p>By registering your details, you agree with our Terms & Conditions, and Privacy and Cookie Policy.</p>
                    </div>
                    
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input id="ddd" class="checkbox-custom" name="ddd" type="checkbox">
                                <label for="ddd" class="checkbox-custom-label">Sign me up for the Newsletter!</label>
                            </div>		
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Create An Account</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="{{ route('employee.signin') }}">Sign In</a></p>
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