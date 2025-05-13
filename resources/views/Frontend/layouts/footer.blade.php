<footer class="light-footer skin-light-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                @php
                    $footerDetails = App\Models\FooterContent::first();
                @endphp
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_widget">
                        <img src="{{ asset('frontEndAssets/img/jobscout.png') }}" class="img-footer small mb-2" alt="" />
                        
                        <div class="address mt-2">
                            {!! $footerDetails['address'] !!}	
                        </div>
                        <div class="address mt-3">
                            {{ $footerDetails['phone'] }}<br>{{ $footerDetails['email'] }}
                        </div>
                        <div class="address mt-2">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="{{ $footerDetails['facebook'] }}" class="theme-cl"><i class="lni lni-facebook-filled"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $footerDetails['twitter'] }}" class="theme-cl"><i class="lni lni-twitter-filled"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $footerDetails['youtube'] }}" class="theme-cl"><i class="lni lni-youtube"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $footerDetails['instagram'] }}" class="theme-cl"><i class="lni lni-instagram-filled"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $footerDetails['linkedin'] }}" class="theme-cl"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">For Employers</h4>
                        <ul class="footer-menu">
                            {{-- <li><a href="#">Explore Candidates</a></li> --}}
                            {{-- <li><a href="#">Job Pricing</a></li> --}}
                            <li><a href="{{ route('employer.hiring.view') }}">Submit Job</a></li>
                            {{-- <li><a href="#">Shortlisted</a></li> --}}
                            <li><a href="{{ route('employer.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                        
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">For Candidates</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('job.search') }}">Explore All Jobs</a></li>
                            <li><a href="{{ route('category') }}">Browse Categories</a></li>
                            <li><a href="{{ route('employer.browse') }}">Browse Companies</a></li>
                            <li><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">About Company</h4>
                        <ul class="footer-menu">
                            {{-- <li><a href="#">Who We'r?</a></li>
                            <li><a href="#">Our Mission</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Dashboard</a></li> --}}
                        </ul>
                    </div>
                </div>
                
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">Helpful Topics</h4>
                        <ul class="footer-menu">
                            {{-- <li><a href="#">Site Map</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ's Page</a></li>
                            <li><a href="#">Privacy</a></li> --}}
                        </ul>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
    
    <div class="footer-bottom br-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">{{ $footerDetails['copyright_text'] }} Developed By <a href="https://github.com/hamzanaji1661">Hamza Naji</a>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-headers">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="ti-close"></span>
                </button>
              </div>
        
            <div class="modal-body p-5">
                <div class="text-center mb-4">
                    <h2 class="m-0 ft-regular">Employee Login</h2>
                </div>
                
                <form method="POST" action="{{ route('employee.signin.submit') }}">		
                    @csrf		
                    <div class="form-group">
                        <label>Username*</label>
                        <input type="text" name="username" class="form-control" placeholder="Username*">
                    </div>
                    
                    <div class="form-group">
                        <label>Password*</label>
                        <input type="password" name="password" class="form-control" placeholder="Password*">
                    </div>
                    
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                <label for="dd" class="checkbox-custom-label">Remember Me</label>
                            </div>	
                            <div class="eltio_k2">
                                <a href="{{ route('employee.recover') }}" class="theme-cl">Lost Your Password?</a>
                            </div>	
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Login</button>
                    </div>
                    
                    <div class="form-group text-center mb-0">
                        <p class="extra">Not a member?<a href="{{ route('employee.signup') }}" class="text-dark"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('frontEndAssets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/slick.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/slider-bg.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/smoothproducts.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/snackbar.min.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/jQuery.style.switcher.js') }}"></script>
<script src="{{ asset('frontEndAssets/js/custom.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->			

</body>
</html>