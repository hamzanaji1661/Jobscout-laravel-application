@extends('admin.layouts.master')

@section('page_title', 'Edit Footer')

@section('body_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">Edit Footer</h4>
                        <p class="card-title-desc">Edit Footer section of the website.
                        </p>
                    </div>
                    <div class="col">
                        <a href="{{ route('home') }}" class="btn btn-primary float-right"><i class="far fa-eye mr-2"></i> View Changes</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <form action="{{ route('admin.topbar.edit.submit') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input class="form-control" value="{{ $topbarData->topbar_contact }}" name="topbar_contact" type="text" placeholder="Enter Category Name">
                          </div>
                          <div class="form-group">
                            <label>Center Text</label>
                            <input class="form-control" value="{{ $topbarData->topbar_center_text }}" name="topbar_center_text" type="text" placeholder="Enter Icon Class">
                          </div><div class="form-group">
                            <label>Hide Top Bar</label>
                            <input class="form-control" value="{{ $topbarData->isHidden }}" name="isHidden" type="text" placeholder="Enter Icon Class">
                          </div>
                          <div class="form-group">
                          <button type="submit" class="btn btn-primary float-right">Update Top Bar</button>
                          </div>
                        </form>
                    </div>
                    <!-- end col -->
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection