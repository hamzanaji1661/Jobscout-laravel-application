@extends('admin.layouts.master')

@section('page_title', 'Edit Blog Post')

@section('body_content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Blog Content</h4>
                <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of wysihtml5 and Twitter Bootstrap.</p>

                <form method="POST" action="{{ route('admin.post.edit.submit',$postSingle->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="blog-title">Enter Blog Title:</label>
                        <input class="form-control" name="title" type="text" id="blog-title" placeholder="Enter Blog Title" value="{{ $postSingle->title }}">
                    </div>
                    <label for="elm1">Blog Content:</label>
                    <textarea id="elm1" name="content">{{ $postSingle->content }}</textarea>
               

            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Blog Settings</h4>
                <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of wysihtml5 and Twitter Bootstrap.</p>

                    <div class="mb-4">
                        <label for="blog-slug">Slug</label>
                        <input class="form-control" name="slug" type="text" id="blog-slug" placeholder="Enter Blog Slug" value="{{ $postSingle->slug }}">
                    </div>
                    <div class="mb-4">
                        <label for="blog-title">Featured Image:</label>
                        <img src="{{ asset('frontEndAssets/img/'.$postSingle->image) }}" class="img-thumbnail" id="image-preview">
                        <label
                        class="btn btn-outline-primary font-size-14 form-control" style="border-style:dashed;"
                        for="file-input"
                        ><i class="fa fa-upload font-size-14 align-middle mr-2"></i>
                        Upload New Feature Image</label
                      >
                      <input
                        type="file"
                        name="image"
                        hidden
                        id="file-input"
                        onchange="previewImage()"
                      />
                    </div>
                    <div class="mb-4">
                        <label for="blog-category">Category:</label>
                        <select id="blog-category" name="category" class="form-control">
                            <option>Select Category</option>
                            <option>Category 1</option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                            <option>Category 4</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="blog-tags">Tags:</label>
                        <input class="form-control" name="tags" value="{{ $postSingle->tags }}" type="text" id="blog-tags" placeholder="Enter Tags">
                    </div>
                    <div class="mb-4">
                        <label for="blog-title">Status:</label>
                        <select class="form-control" name="status">
                            <option>Select Status</option>
                            <option>Published</option>
                            <option>Draft</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary form-control">Publish Blog</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end col -->
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