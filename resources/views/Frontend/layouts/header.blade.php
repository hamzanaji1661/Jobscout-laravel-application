<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="title" content="JobScout - Your Ultimate Job Portal App">
    <meta name="description"
        content="JobScout is an advance job portal application that helps job seekers find employment opportunities that match their skills, interests, and experience.">
    <meta name="keywords"
        content="job portal, job search, employment opportunities, resume builder, job search tips, networking, job interviews, salary negotiation, job openings">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="2 days">
    <meta name="author" content="JobScout">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - JobScout</title>

    <!-- Custom CSS -->
    <link href="{{ asset('frontEndAssets/css/styles.css') }}" rel="stylesheet">
    @livewireScripts
    @livewireStyles
</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        @php
            $topbarData = App\Models\Topbar::first();
        @endphp
        @if ($topbarData->isHidden == 0)
            <div class="py-2 bg-dark">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
                            <div class="top_first"><a href="callto:{{ $topbarData['topbar_contact'] }}"
                                    class="medium text-light">{{ $topbarData['topbar_contact'] }}</a></div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 hide-ipad">
                            <div class="top_second text-center">
                                <p class="medium text-light m-0 p-0">{{ $topbarData['topbar_center_text'] }} </p>
                            </div>
                        </div>

                        <!-- Right Menu -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12">
                            <div class="currency-selector dropdown js-dropdown float-right mr-3">
                                @if (Auth::guard('employee')->check())
                                <a href="{{ route('employee.logout') }}" class="text-light medium">Log Out</a>
                            @elseif(Auth::guard('employer')->check())
                            <a href="{{ route('employer.logout') }}" class="text-light medium">Log Out</a>
                            @else

                               @endif
                            </div>
                            <div class="currency-selector dropdown js-dropdown float-right mr-3">
                                <a href="{{ route('employee.job.bookmarks') }}" class="text-light medium">Wishlist</a>
                            </div>

                            <div class="currency-selector dropdown js-dropdown float-right mr-3">
                                @if (Auth::guard('employee')->check())
                                    <a href="{{ route('employee.dashboard') }}"
                                        class="text-light medium">{{ auth()->guard('employee')->user()->firstname .' ' .Auth::guard('employee')->user()->lastname }}</a>
                                @elseif(Auth::guard('employer')->check())
                                    <a href="{{ route('employer.dashboard') }}"
                                        class="text-light medium">{{ auth()->guard('employer')->user()->employer_name }}</a>
                                @else
                                    <a href="{{ route('employee.dashboard') }}" data-toggle="modal" data-target="#login"
                                        class="text-light medium">My Account</a>
                                @endif
                            </div>
                            

                        </div>

                    </div>
                </div>
            </div>
        @else
        @endif
        <!-- Start Navigation -->
        <div class="header header-light dark-text @yield('header_shadow')">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ route('home') }}">
                            <img src="{{ asset('frontEndAssets/img/jobscout.png') }}" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login" class="theme-cl fs-lg">
                                        <i class="lni lni-user"></i>
                                    </a>
                                </li>
                                @if (Auth::guard('employee')->check())
                                    <li>
                                        <a href="{{ route('job.search') }}"
                                            class="crs_yuo12 w-auto text-white theme-bg">
                                            <span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Post
                                                Job</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('employer.hiring.view') }}"
                                            class="crs_yuo12 w-auto text-white theme-bg">
                                            <span class="embos_45"><i
                                                    class="fas fa-plus-circle mr-1 mr-1"></i>Apply</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        @include('Frontend.layouts.nav')
                        <ul class="nav-menu nav-menu-social align-to-right">
                            @if (Auth::guard('employer')->check())
                                <li>
                                    <a href="{{ route('employer.dashboard') }}" class="ft-medium">
                                        <i class="lni lni-dashboard mr-2"></i>Dashboard
                                    </a>
                                </li>
                            @elseif(Auth::guard('employee')->check())
                                <li>
                                    <a href="{{ route('employee.dashboard') }}" class="ft-medium">
                                        <i class="lni lni-dashboard mr-2"></i>Dashboard
                                    </a>
                                @else
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login" class="ft-medium">
                                        <i class="lni lni-user mr-2"></i>Job Seeker Sign In
                                    </a>
                                </li>
                            @endif
                            @if (Auth::guard('employee')->check())
                                <li class="add-listing theme-bg">
                                    <a href="{{ route('job.search') }}">
                                        <i class="lni lni-circle-plus mr-1"></i> Find a Job
                                    </a>
                                </li>
                            @else
                                <li class="add-listing theme-bg">
                                    <a href="{{ route('employer.hiring.view') }}">
                                        <i class="lni lni-circle-plus mr-1"></i> Recruter Sign In
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
