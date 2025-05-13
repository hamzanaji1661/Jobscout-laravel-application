@extends('admin.layouts.master')

@section('page_title', 'Job Locations')

@section('body_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">All Locations</h4>
                        <p class="card-title-desc">All the categories must have an icon, To add the icon you need to input the class name of the icon for example: <code>lni lni-laptop-phone</code>. To get the list of icons and the class name please visit <a href="https://lineicons.com/icons/" target="_blank">Lineicons</a></code>.
                        </p>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-add-locations-modal-center"><i class="far fa-plus-square mr-2"></i> Add New Location</button>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Locations ID</th>
                            <th>Locations Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($jobLocations as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.job.location.edit', $item->id) }}" class="btn btn-sm btn-outline-primary mr-2" title="Edit" data-toggle="tooltip"><i class="mdi mdi-circle-edit-outline"></i> Edit</a>
                                <a href="{{ route('admin.job.location.delete', $item->id) }}" class="btn btn-sm btn-outline-danger" title="Delete" data-toggle="tooltip"><i class="mdi mdi-delete-outline"></i> Delete</a>
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

<div class="modal fade bs-add-locations-modal-center" tabindex="-1" role="dialog" aria-labelledby="addLocationsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add New Locations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.job.location.create') }}">
                    @csrf
                    <div class="form-group">
                      <label for="text">Location Name</label> 
                      <input id="text" name="name" placeholder="Enter Locations Name" type="text" class="form-control">
                    </div> 
                    <div class="form-group">
                      <button name="submit" type="submit" class="btn btn-primary form-control">Add Location</button>
                    </div>
                  </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection