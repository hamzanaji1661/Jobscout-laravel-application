@extends('Frontend.layouts.masterDashboard')            
@section('page_title')#1 Job Portal Company @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
@include('Frontend.layouts.employeeDashboardNav')
        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><span id="greeting"></span>, {{ Auth::guard('employee')->user()->firstname }}!</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dash-widgets py-5 px-4 bg-info rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light">{{ $appliedJobs }}</h2>
                            <p class="p-0 m-0 text-light fs-md">Applied Jobs</p>
                            <i class="lni lni-empty-file"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dash-widgets py-5 px-4 bg-success rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light">{{ $approvedJobs }}</h2>
                            <p class="p-0 m-0 text-light fs-md">Approved Job</p>
                            <i class="lni lni-checkmark-circle"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dash-widgets py-5 px-4 bg-primary rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light">{{ $rejectrdJobs }}</h2>
                            <p class="p-0 m-0 text-light fs-md">Rejected Jobs</p>
                            <i class="lni lni-cross-circle"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dash-widgets py-5 px-4 bg-purple rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light">{{ $bookmarkedJobs }}</h2>
                            <p class="p-0 m-0 text-light fs-md">Bookmark jobs</p>
                            <i class="lni lni-heart"></i>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard-gravity-list with-icons">
                            <h4 class="mb-0 ft-medium">Recent Activities</h4>
                            <ul>
                                @foreach ($activityLog as $recentActivity)
                                <li>
                                    <i class="dash-icon-box ti-time text-purple bg-light-purple"></i> You {!! $recentActivity->activity !!}</a>.
                                    <a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
                                </li>
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard-gravity-list invoices with-icons">
                            <h4 class="mb-0 ft-medium">Latest Job Listings</h4>
                            <ul>
                                
                                <li><i class="dash-icon-box ti-files text-warning bg-light-warning"></i>
                                    <strong class="ft-medium text-dark">Starter Plan</strong>
                                    <ul>
                                        <li class="unpaid">Unpaid</li>
                                        <li>Order: #20551</li>
                                        <li>Date: 01/08/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                
                                <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                    <strong class="ft-medium text-dark">Basic Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20550</li>
                                        <li>Date: 01/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                    <strong class="ft-medium text-dark">Basic Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20550</li>
                                        <li>Date: 01/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                    <strong class="ft-medium text-dark">Basic Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20550</li>
                                        <li>Date: 01/07/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>

                                <li><i class="dash-icon-box ti-files text-danger bg-light-danger"></i>
                                    <strong class="ft-medium text-dark">Extended Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20549</li>
                                        <li>Date: 01/06/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                
                                <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                    <strong class="ft-medium text-dark">Platinum Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20548</li>
                                        <li>Date: 01/05/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                
                                <li><i class="dash-icon-box ti-files text-warning bg-light-warning"></i>
                                    <strong class="ft-medium text-dark">Extended Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20547</li>
                                        <li>Date: 01/04/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>
                                
                                <li><i class="dash-icon-box ti-files text-info bg-light-info"></i>
                                    <strong class="ft-medium text-dark">Platinum Plan</strong>
                                    <ul>
                                        <li class="paid">Paid</li>
                                        <li>Order: #20546</li>
                                        <li>Date: 01/03/2019</li>
                                    </ul>
                                    <div class="buttons-to-right">
                                        <a href="javascript:void(0);" class="button text-light bg-warning">View Invoice</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>	
                </div>	
@endsection