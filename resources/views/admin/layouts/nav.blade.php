
<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="{{ route('admin.home') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="20">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="18">
                </span>
            </a>

            <a href="{{ route('admin.home') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="20">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="18">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="topnav">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link arrow-none" href="#" id="topnav-dashboard" role="button" aria-expanded="false">
                                Dashboard 
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Page Setting<div class="arrow-down"></div>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                <a href="{{ route('admin.homepage.edit') }}" class="dropdown-item">Edit Homepage</a>
                                {{-- <a href="calendar.html" class="dropdown-item">Manage Testimonial</a>
                                <a href="calendar.html" class="dropdown-item">Menu Item</a>
                                <a href="calendar.html" class="dropdown-item">Menu Item</a> --}}
                               

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Job Section  <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                <a href="{{ route('admin.job.category') }}" class="dropdown-item">Category</a>
                                <a href="{{ route('admin.job.location') }}" class="dropdown-item">Location</a>
                                {{-- <a href="calendar.html" class="dropdown-item">Salary</a> --}}
                                <a href="{{ route('admin.job.type') }}" class="dropdown-item">Job Type</a>
                                <a href="{{ route('admin.job.experience') }}" class="dropdown-item">Experience</a>


                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Management <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        User Management <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                        <a href="{{ route('admin.employee.manage') }}" class="dropdown-item">Manage Employees</a>
                                        <a href="{{ route('admin.employer.manage') }}" class="dropdown-item">Manage Employers</a>
                                    </div>
                                </div>
                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hiring Management <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                        <a href="tables-basic.html" class="dropdown-item">Manage Hirings</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Application Management <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                        <a href="charts-apex.html" class="dropdown-item">Manage Applications</a>
                                    </div>
                                </div> --}}
                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Icons <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                        <a href="icons-boxicons.html" class="dropdown-item">Boxicons</a>
                                        <a href="icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                        <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                        <a href="icons-fontawesome.html" class="dropdown-item">Font awesome</a>
                                    </div>
                                </div> --}}
                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Logs <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-map">
                                        <a href="maps-google.html" class="dropdown-item">Activity Log</a>
                                        <a href="maps-vector.html" class="dropdown-item">System Log</a>
                                    </div>
                                </div> --}}

                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-layouts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Layouts <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layouts">
                                        <a href="layouts-vertical.html" class="dropdown-item">Vertical</a>
                                        <a href="layouts-preloader.html" class="dropdown-item">Preloader</a>
                                        <a href="layouts-boxed.html" class="dropdown-item">Boxed</a>
                                        <a href="layouts-topbar-light.html" class="dropdown-item">Topbar Light</a>
                                    </div>
                                </div> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Blogs  <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                <a href="{{ route('admin.post') }}" class="dropdown-item">List Blogs</a>
                                <a href="{{ route('admin.post.create') }}" class="dropdown-item">Add Blog Post</a>
                            </div>
                        </li>
                        
                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Logs  <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                <a href="{{ route('admin.activitylog.view') }}" class="dropdown-item">Activity Log</a>
                                {{-- <a href="{{ route('admin.job.category') }}" class="dropdown-item">System Logs</a>
                                <a href="calendar.html" class="dropdown-item">Gateway Log</a> --}}


                            </div>
                        </li>
                        

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="d-flex">
        <div class="dropdown d-inline-block d-lg-none ml-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        

        
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/'.Auth::guard('admin')->user()->photo) }}" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ml-1">{{ Auth::guard('admin')->user()->name }}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
            </div>
        </div>
    </div>
</div>
