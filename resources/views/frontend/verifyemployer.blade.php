@extends('Frontend.layouts.master')
@section('page_title')Terms & Policies @endsection
@section('body_content')

<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-center">
        
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <form class="border p-3 rounded">	
                    <div class="sec_title position-relative text-center mt-2 mb-5">
                        <h6 class="text-muted mt-3 mb-0"> @if (session()->get('success')) {{ session()->get('success') }} @endif</h6>
                    </div>			
                    <img class="mx-auto d-block" style="max-width:200px;" src="{{ asset('frontEndAssets/img/emailverification.svg') }}">
                    <div class="sec_title position-relative text-center mt-2 mb-5">
                        <h2 class="ft-bold">Verify Your Email</h2>
                        <h6 class="text-muted mt-3 mb-0">Congratulations, your email just got a special delivery - the one and only verification link! Check your inbox ASAP and let's get this party started!</h6>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('employer.signin') }}" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Back To Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Login End ======================== -->

<!-- ======================= Newsletter Start ============================ -->
<section class="space bg-cover" style="background:#03343b url({{ asset('frontEndAssets/img/landing-bg.png') }}) no-repeat;">
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