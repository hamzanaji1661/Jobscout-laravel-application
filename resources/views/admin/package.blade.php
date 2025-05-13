@extends('admin.layouts.master')

@section('page_title', 'List Packages')

@section('body_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">All Packages</h4>
                        <p class="card-title-desc">All the packages are listed here, You acan add more packages as you like and set pricing and features for individual packages. It is recommended to have 3 packages at max.
                        </p>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-add-category-modal-center"><i class="far fa-plus-square mr-2"></i> Add New Package</button>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Package ID</th>
                            <th>Package Name</th>
                            <th>Package Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($packages as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }} USD</i></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.package.edit', $item->id) }}" class="btn btn-sm btn-outline-primary mr-2" title="Edit" data-toggle="tooltip"><i class="mdi mdi-circle-edit-outline"></i> Edit</a>
                                <a href="{{ route('admin.package.delete', $item->id) }}" class="btn btn-sm btn-outline-danger" title="Delete" data-toggle="tooltip"><i class="mdi mdi-delete-outline"></i> Delete</a>
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

<div class="modal fade bs-add-category-modal-center" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add New Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.package.create.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Package Name</label> 
                                <input id="text" name="packageName" placeholder="Enter Package Name" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text1">Price</label> 
                                <input id="text1" name="packagePrice" placeholder="Enter Package Price" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Package Duration</label> 
                                <input id="text" name="packageDuration" placeholder="Enter Package Duration" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text1">Duration Type</label> 
                                <input id="text1" name="packageDurationType" placeholder="Enter Package Dusation Type" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Total Job Allowed</label> 
                                <input id="text" name="totalJobAllowed" placeholder="Enter Total Jobs Allowed" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text1">Total Featured Jobs</label> 
                                <input id="text1" name="totalFeaturedJobs" placeholder="Enter Total Featured Jobs Allowed" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Total Photos Allowed</label> 
                                <input id="text" name="totalPhotosAllowed" placeholder="Enter Total Photos Allowed" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text1">Total Videos Jobs</label> 
                                <input id="text1" name="totalVideosAllowed" placeholder="Enter Total Videos Jobs" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                              </div>
                        </div>
                    </div> 
                    <div class="form-group">
                      <button name="submit" type="submit" class="btn btn-primary form-control">Add Package</button>
                    </div>
                  </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection