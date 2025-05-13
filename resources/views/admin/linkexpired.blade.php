<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Link Invalid Or Expired</title>
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

                        <div class="card-body">

                            <div class="text-center p-3">

                                <div class="img">
                                    <img src="{{ asset('assets/images/error-img.png') }}" class="img-fluid" alt="">
                                </div>

                                <h1 class="error-page mt-5"><span>Oopsie!</span></h1>
                                <h4 class="mb-4 mt-5">Looks Like The Great Link Escape</h4>
                                <p class="mb-4 w-75 mx-auto">That link seems to have gone on a wild goose chase or has simply expired into thin air. Can't blame it though, even links need a break sometimes!</p>
                                <a class="btn btn-primary mb-4 waves-effect waves-light" href="{{ route('admin.recover') }}">Back to Reset Password</a>
                            </div>

                        </div>
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