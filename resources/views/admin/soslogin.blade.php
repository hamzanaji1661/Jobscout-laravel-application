<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Re-Password | Qovex - Responsive Bootstrap 4 Admin Dashboard</title>
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
                                <h5 class="text-white font-size-20">Login Using OTP</h5>
                                <p class="text-white-50 mb-0">Get Code Via Email.</p>

                                <a href="index.html" class="logo logo-admin mt-4">
                                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">

                                <form class="form-horizontal" method="post" action="{{ route('admin.soslogin.submit') }}">
                                    @csrf
                                    @if (session()->get('tokenError'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="fas fa-info-circle me-3"> </i> {{ session()->get('tokenError') }}
                                      </div>
                                      <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('admin.login') }}" class="btn btn-primary w-md waves-effect waves-light">Back To Password Login</a>
                                        </div>
                                    </div>
                                    @else
                                    @if (session()->get('error'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <i class="fas fa-info-circle me-3"> </i> {{ session()->get('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                    @elseif(session()->get('success'))
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="useremail">Email Address</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="useremail" placeholder="Enter email address">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Send Code</button>
                                        </div>
                                    </div>
                                    @endif
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