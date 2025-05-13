@extends('Frontend.layouts.masterDashboard')            
@section('page_title')#1 Job Portal Company @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
@include('Frontend.layouts.employerDashboardNav')

<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-5">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Manage Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                {{-- <div class="d-flex align-items-center p-3 alert alert-danger">
                    Your listings will be automatically removed after 30 days.
                </div> --}}
                <div class="mb-4 tbl-lg rounded overflow-hidden">
                    <div class="table-responsive bg-white">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Title</th>
                                  <th scope="col">Boost Status</th>
                                  <th scope="col">Posted Date</th>
                                  <th scope="col">Expires</th>
                                  <th scope="col">Applications</th>
                                  <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    
                                $count = 0;
                                @endphp
                                @foreach ($hiring as $item)
                                @php
                                    
                                    $userID = Auth::user()->id;
                                    
                                @endphp
                                <tr>
                                    <td>
                                        <div class="dash-title">
                                            <h4 class="mb-0 ft-medium fs-sm">
                                                {{ $item->title }}
                                                <span class="medium theme-cl rounded @if($item->status == 'Published') text-success bg-light-success @elseif($item->status == 'Draft') text-info bg-light-info @else text-danger bg-light-danger @endif ml-1 py-1 px-2">{{ $item->status }}</span>
                                            </h4>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dash-filled">
                                            
                                            @if($item->isBoosted == 'yes')
                                            <span class="p-2 bg-info text-white d-inline-flex align-items-center justify-content-center">
                                                Boost Active
                                            </span>
                                            @else
                                            <span class="p-2 bg-warning text-white d-inline-flex align-items-center justify-content-center">
                                                Ready To Boost
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ date('d M Y', strtotime($item->deadline)) }}</td>
                                    <td>
                                        <a href="{{ route('employer.hiring.applicants', $item->id) }}" class="gray rounded px-3 py-2 ft-medium">
                                            @php
                                            $applications = App\Models\EmployeeApplication::where('job_id', $item->id)->count(); 
                                            echo $applications;
                                            @endphp
                                        </a>
                                    </td>
                                    <td>
                                        <div class="dash-action">
                                            @if($item->isBoosted == 'yes')
                                           <a href="{{ route('employer.employee.boost.submit', $item->id) }}" class="btn btn-primary">Extend Days</a>
                                           @else
                                           <a href="{{ route('employer.employee.boost.submit', $item->id) }}" class="btn btn-primary">Boost Job</a>
                                           @endif
                                        </div>
                                    </td>
                                </tr>
                                 @php
                                    $JOBid = $item->id;
                                     //$JOBid;
                                 @endphp
                                    
                                         
                                    
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
    </div>


@endsection