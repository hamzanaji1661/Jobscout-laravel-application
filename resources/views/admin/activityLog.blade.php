@extends('admin.layouts.master')

@section('page_title', 'Activity Logs')

@section('body_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">User Activity Logs</h4>
                        <p class="card-title-desc">List of all user activity logs. IP is logged for security reasons. 
                        </p>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Activity ID</th>
                            <th>Initiated By</th>
                            <th>Activity</th>
                            <th>Activity On</th>
                            <th>Activity (Browser/OS)</th>
                            <th>Activity From IP</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->initiated_by }}</td>
                            <td>{!! $log->activity !!}</td>
                            <td>{{ $log->activity_on }}</td>
                            <td><span class="badge badge-info">{{ $log->activity_from }}</span></td>
                            <td>{{ $log->activity_from_ip }} <a href="https://whatismyipaddress.com/ip/{{ $log->activity_from_ip }}">Lookup</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>

@endsection