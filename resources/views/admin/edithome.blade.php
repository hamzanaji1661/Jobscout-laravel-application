@extends('admin.layouts.master')

@section('page_title', 'Edit Header Banner')

@section('body_content')

  <div class="card">
    <div class="card-body">

        {{-- <h4 class="card-title">Caution:</h4>
        <p class="card-title-desc">Do not forget to save after changing settings.</p> --}}

        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#experience" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">Header Banner Section</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                    <span class="d-none d-sm-block">Top Categories Section</span>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="experience" role="tabpanel">
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('admin.updateHomepage') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                  <h4 class="card-title">Top Banner Image</h4>
                                  <p class="card-title-desc">
                                    You can upload and change the top banner image from here.
                                  </p>
                                  <div>
                                    <img
                                      class="img-thumbnail" id="image-preview"
                                      src="{{ asset('frontEndAssets/img/'.$pageHomeData->image) }}"
                                    />
                                  </div>
                                  <div class="mt-3">
                                    <label
                                      class="btn btn-outline-primary font-size-14 form-control" style="border-style:dashed;"
                                      for="file-input"
                                      ><i class="fa fa-upload font-size-14 align-middle mr-2"></i>
                                      Upload New Banner Image</label
                                    >
                                    <input
                                      type="file"
                                      name="image"
                                      hidden
                                      id="file-input"
                                      onchange="previewImage()"
                                    />
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <h4 class="card-title">Sizing</h4>
                                  <p class="card-title-desc">
                                    Set heights using classes like <code>.form-control-lg</code> and
                                    <code>.form-control-sm</code>.
                                  </p>
                                  <div>
                                    <div class="mb-4">
                                      <label for="headertitle">Header Title</label>
                                      <input
                                        class="form-control"
                                        type="text" name="heading"
                                        id="headertitle" value="{{ $pageHomeData->heading }}"
                                        placeholder="Enter Header Title"
                                      />
                                    </div>
                                    <div class="mb-4">
                                      <label for="exampleFormControlTextarea1"
                                        >Header Description</label
                                      >
                                      <textarea
                                        class="form-control" name="description"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                      >{{ $pageHomeData->description }}</textarea>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6">
                                        <div class="mb-4">
                                          <label for="headertitle">Search Job Placeholder</label>
                                          <input
                                            class="form-control"
                                            type="text" name="job_placeholder"
                                            id="headertitle" value="{{ $pageHomeData->job_placeholder }}"
                                            placeholder="Enter Header Title"
                                          />
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6">
                                        <div class="mb-4">
                                          <label for="headertitle">Search Location Placeholder</label>
                                          <input
                                            class="form-control"
                                            type="text" name="location_placeholder"
                                            id="headertitle" value="{{ $pageHomeData->location_placeholder }}"
                                            placeholder="Enter Header Title"
                                          />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6">
                                        <div class="mb-4">
                                          <label for="headertitle">Search Category Placeholder</label>
                                          <input
                                            class="form-control"
                                            type="text" name="category_placeholder"
                                            id="headertitle" value="{{ $pageHomeData->category_placeholder }}"
                                            placeholder="Enter Header Title"
                                          />
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6">
                                        <div class="mb-4">
                                          <label for="headertitle">Search Button Placeholder</label>
                                          <input
                                            class="form-control"
                                            type="text" name="job_button"
                                            id="headertitle" value="{{ $pageHomeData->job_button }}"
                                            placeholder="Enter Header Title"
                                          />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary form-control">Save Changes</button>
                                  </div>
                                </div>
                                {{-- </form> --}}
                              </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- Timeline row Over -->
            </div>
            <div class="tab-pane" id="revenue" role="tabpanel">
              
            </div>
            <div class="tab-pane" id="settings" role="tabpanel">
                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">
                  Set heights using classes like <code>.form-control-lg</code> and
                  <code>.form-control-sm</code>.
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                            @csrf
                        <div class="form-group">
                            <label>Pre-Heading</label>
                            <input class="form-control" name="category_heading" type="text" value="{{ $pageHomeData->job_category_description }}" placeholder="Enter Pre-Heading">
                          </div>
                          <div class="form-group">
                            <label>Main Heading</label>
                            <input class="form-control" name="category_description" type="text" value="{{ $pageHomeData->job_category_heading }}" placeholder="Enter Heading">
                          </div>
                          <div class="square-switch">
                            <label>Hide Top Categories Section</label><br>
                            <input type="hidden" name="isShown" @if( $pageHomeData->job_category_status == 'Show') @endif id="isCheckedHidden" value="Show"> 
                            <input name="isShown" type="checkbox" @if( $pageHomeData->job_category_status == 'Hide') checked @endif id="isChecked" switch="primary" value="Hide"/>
                            <label for="isChecked" data-on-label="On" data-off-label="Off"></label>
                            
                          </div>
                        
                    </div>
                    <!-- end col -->
                </div>
                <div class="mt-2 d-flex float-right">
                  <button type="submit" class="btn btn-primary form-control">Save Changes</button>
                </div>
            </div>
          </form>
        </div>

    </div>
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