@extends('admin.layouts.master')

@section('page_title', 'Manage Employers')

@section('body_content')
<style>
    .results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">All Employers</h4>
                        <p class="card-title-desc">All the categories must have an icon, To add the icon you need to input the class name of the icon for example: <code>lni lni-laptop-phone</code>. To get the list of icons and the class name please visit <a href="https://lineicons.com/icons/" target="_blank">Lineicons</a></code>.
                        </p>
                    </div>
                    
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap results" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>
                    <thead>
                        <tr scope="row">
                            <th>User ID</th>
                            <th>Employer Logo</th>
                            <th>Employer Name</th>
                            <th>Employer Email</th>
                            <th>Employer Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- @if($item->isSuspended == 'yes')  @endif --}}
                    <tbody>
                        @foreach ($listEmployers as $item)
                        <tr>
                            <td @if($item->isSuspended == 'yes') style="background-color: #a5a5a55c;" @endif>{{ $item->id }}</td>
                            <td @if($item->isSuspended == 'yes') style="background-color: #a5a5a55c;" @endif>{{ $item->logo }}</td>
                            <td @if($item->isSuspended == 'yes') style="background-color: #a5a5a55c;" @endif>{{ $item->employer_name }}</td>
                            <td @if($item->isSuspended == 'yes') style="background-color: #a5a5a55c;" @endif>{{ $item->email }}</td>
                            <td @if($item->isSuspended == 'yes') style="background-color: #a5a5a55c;" @endif>{{ $item->address }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    @if($item->isSuspended == 'yes')
                                    <a href="{{ route('admin.employer.unsuspend', $item->id) }}" class="btn btn-sm btn-outline-warning mr-2" title="Unsuspend" data-toggle="tooltip"><i class="mdi mdi-circle-edit-outline"></i> Unsuspend</a>
                                    @else
                                <a href="{{ route('admin.employer.suspend', $item->id) }}" class="btn btn-sm btn-outline-warning mr-2" title="Suspend" data-toggle="tooltip"><i class="mdi mdi-circle-edit-outline"></i> Suspend</a>
                                @endif
                                <a href="{{ route('admin.employer.delete', $item->id) }}" class="btn btn-sm btn-outline-danger" title="Terminate" data-toggle="tooltip"><i class="mdi mdi-delete-outline"></i> Terminate</a>
                                </div>
                            </td>
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