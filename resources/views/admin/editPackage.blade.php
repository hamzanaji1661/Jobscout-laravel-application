@extends('admin.layouts.master')

@section('page_title', 'Edit Job Category')

@section('body_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">Edit Package</h4>
                        <p class="card-title-desc">Edit package informations and the prices.
                        </p>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.job.category') }}" class="btn btn-primary float-right"><i class="far fa-eye mr-2"></i> View All Packages</a>
                    </div>
                </div>
                    <form method="post" action="{{ route('admin.package.edit.submit', $package->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Package Name</label> 
                                    <input id="text" value="{{ $package->name }}" name="packageName" placeholder="Enter Package Name" type="text" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1">Price</label> 
                                    <input id="text1" value="{{ $package->price }}" name="packagePrice" placeholder="Enter Package Price" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Package Duration</label> 
                                    <input id="text" value="{{ $package->duration }}" name="packageDuration" placeholder="Enter Package Duration" type="text" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1">Duration Type</label> 
                                    <input id="text1" value="{{ $package->duration_type }}" name="packageDurationType" placeholder="Enter Package Dusation Type" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Total Job Allowed</label> 
                                    <input id="text" value="{{ $package->jobs_count }}" name="totalJobAllowed" placeholder="Enter Total Jobs Allowed" type="text" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1">Total Featured Jobs</label> 
                                    <input id="text1" value="{{ $package->featured_count }}" name="totalFeaturedJobs" placeholder="Enter Total Featured Jobs Allowed" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Total Photos Allowed</label> 
                                    <input id="text" value="{{ $package->photos_count }}" name="totalPhotosAllowed" placeholder="Enter Total Photos Allowed" type="text" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1">Total Videos Jobs</label> 
                                    <input id="text1" value="{{ $package->videos_count }}" name="totalVideosAllowed" placeholder="Enter Total Videos Jobs" type="text" class="form-control" aria-describedby="text1HelpBlock"> 
                                  </div>
                            </div>
                        </div> 
                        <div class="form-group">
                          <button name="submit" type="submit" class="btn btn-primary float-right">Save Package</button>
                        </div>
                      </form>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection