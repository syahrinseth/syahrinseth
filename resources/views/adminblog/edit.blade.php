@extends('Layouts.master-admin')
@section('title', 'Blog Edit Post')
@section('custom-css')
<style>
    * { box-sizing: border-box; }
body {
  font: 16px Arial;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
@endsection
@section('content')
<div class="content">
    @include('Layouts.message-admin')
    @include('Layouts.validate-admin')
    <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Blog Post</h4>
                 <!-- <a href="#" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Post</a> -->
              </div>
              <div class="card-body">

    <form action="{{route('update.adminblog', ['id' => $MasterBlog->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$MasterBlog->title}}">
        </div>
        <div class="form-group">
            <label for="title">Body:</label>
            <textarea name="body" id="summernote" class="form-control">{{$MasterBlog->body}}</textarea>
        </div>

        <div class="row">

            @if($MasterBlog->cover_img == null)

                <div class="col-6">
                    <label for="cover_image">Cover Image:</label>
                    <br>
                    <div id="dropZ">
                        <div class="selectFile">
                        <label for="file">Select file</label>
                        <input type="file" name="cover_img" id="file">
                        </div>
                        <p>File size limit : 10 MB</p>
                    </div>
                </div>
            @else
                <div class="col-6">
                    <label for="cover_image">Cover Image:</label>
                    <br>
                    <div id="dropZ">
                        <img class="panel-img-top" src="{{str_replace('public', 'storage', $MasterBlog->cover_img)}}" alt="Card image cap" width="200px" id="cover_img">
                        <br>
                        <a class="btn btn-danger" href="#dropZ" id="remove_img">Remove</a>
                    </div>
                </div>
                <div class="col-6">
                    <label for="category">Category</label>
                    <div class="from-group">
                        <select name="category" id="" class="form-control">
                            <option value="">Select</option>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    @if($blog_category != null)
                                        @if($blog_category->category == $category->category)
                                            <option value="{{$category->category}}" selected>{{$category->category}}</option>
                                        @else
                                            <option value="{{$category->category}}">{{$category->category}}</option>
                                        @endif
                                    @else
                                        <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label for="category">Publish Status</label>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="publish" id="publish" value="1" {{$MasterBlog->publish == 1 ? "checked='checked'" : ""}}>
                                    Publish On
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="publish" id="publish" value="0" {{$MasterBlog->publish == 0 ? "checked='checked'" : ""}}>
                                    Publish Off
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>

        <div class="row">

        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-simple" href="{{route('index.adminblog')}}">Cancel</a>
    </form>
              </div>
            </div>
</div>
@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){
        $('#blog').attr('class', 'active');
        $('#summernote').summernote({
            placeholder: 'Body',
            tabsize: 2,
            height: 300
        });

        $(document).on('click', 'a#remove_img', function(){
            $('a#remove_img').remove();
            $('img#cover_img').remove();
            $('div#dropZ').append('<div class="selectFile"><label for="file">Select file</label><input type="file" name="cover_img" id="file"></div><p>File size limit : 10 MB</p>');
        });


    });
</script>
@endsection
