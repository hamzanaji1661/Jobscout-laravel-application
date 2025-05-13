<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Login | JobScout Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome Back Admin!</h5>
                                <p class="text-white-50 mb-0">Sign in to continue to Dashboard.</p>
                                <a href="index.html" class="logo logo-admin mt-4">
                                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form class="form-horizontal needs-validation" method="post" action="{{ route('admin.login.submit') }}">
                                    @csrf
                                    @if (session()->get('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper me-2"> </i> {{ session()->get('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          @elseif(session()->get('success'))
                                          <div class="alert alert-success text-center mb-4" role="alert">
                                              {{ session()->get('success') }}
                                          </div>
                                    @endif
                                    <div class="form-group has-validation">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Enter password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="{{ route('admin.recover') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                        <div class="border-bottom w-100 ml-5"></div>
                                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                                        <div class="border-bottom w-100 mr-5"></div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('admin.soslogin') }}" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Sign in using a (OTP)</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© {{ date('Y') }} Jobscout. Crafted with <i class="mdi mdi-heart text-danger"></i> by Nujan Sitaula</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>