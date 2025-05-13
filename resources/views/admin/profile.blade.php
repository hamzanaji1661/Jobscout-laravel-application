@extends('admin.layouts.master')

@section('page_title', 'Edit Profile')

@section('body_content')
    <div class="row">
      <div class="col-md-12 col-xl-3">
          <div class="card">
            <form class="form" method="post" action="{{ route('admin.profile.submit') }}" enctype="multipart/form-data">
              @csrf

              <div class="card-body">
                  <div class="profile-widgets py-3">

                      <div class="text-center">
                          <div class="">
                              <img id="image-preview" src="{{ asset('assets/images/users/'.Auth::guard('admin')->user()->photo) }}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                              <div class="online-circle"><i class="fas fa-circle text-success"></i></div>
                          </div>

                          <div class="mt-3 ">
                              <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::guard('admin')->user()->name }}</a>
                              <p class="text-body mt-1 mb-1">UI/UX Designer</p>

                              <span class="badge badge-primary">Administrator User</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <label class="btn btn-outline-primary font-size-14 form-control" style="border-style:dashed;" for="file-input"><i class="fa fa-upload font-size-14 align-middle mr-2"></i> Change Profile Picture</label>
                    <input type="file" name="photo" hidden id="file-input" onchange="previewImage()" />
                </div>
              </div>
          </div>
      </div>

      <div class="col-md-12 col-xl-9">
          <div class="card">
              <div class="card-body">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#experience" role="tab">
                              <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                              <span class="d-none d-sm-block">Update Details</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block">Change Password</span>
                          </a>
                      </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content p-3 text-muted">
                      <div class="tab-pane active" id="experience" role="tabpanel">
                              <div class="row mt-4">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="firstname">Full Name</label>
                                          <input type="text" name="name" class="form-control" id="firstname" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter first name">
                                      </div>
                                      <div class="form-group">
                                          <label for="useremail">Email Address</label>
                                          <input type="email" name="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" id="useremail" placeholder="Enter email">
                                      </div>
                                  </div>
                                  <!-- end col -->
                              </div>
                              <!-- Timeline row Over -->
                      </div>
                      <div class="tab-pane" id="revenue" role="tabpanel">
                        
                      </div>
                      <div class="tab-pane" id="settings" role="tabpanel">

                          <div class="row mt-4">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label>New Password</label>
                                      <input class="form-control" name="password" type="password" placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group">
                                      <label>Re-Password</label>
                                      <input class="form-control" name="confirm_password" type="password" placeholder="Re-Enter Password">
                                    </div>
                              </div>
                              <!-- end col -->
                          </div>
                      </div>
                      
                  </div>
                  <div class="col-12">
                  <button class="btn btn-primary float-right">Update Profile</button>
              </div>
              </div>
          </div>
      </div>
    </form>

  </div>
  
    <script>
      function previewImage() {
          var preview = document.querySelector('#image-preview');
          var file = document.querySelector('#file-input').files[0];
          var reader = new FileReader();
  
          reader.onloadend = function() {
              preview.src = reader.result;
          }
  
          if (file) {
              reader.readAsDataURL(file);
          } else {
              preview.src = "";
          }
      }
  </script>
@endsection