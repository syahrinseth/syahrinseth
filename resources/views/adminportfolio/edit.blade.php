@extends('Layouts.master-admin')
@section('title', 'Blog Edit Portfolio')
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
                <h4 class="card-title"> Edit Portfolio</h4>
                 <!-- <a href="#" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Post</a> -->
              </div>
              <div class="card-body">

    <form action="{{route('update.adminportfolio', ['id' => $portfolio->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="project_name" class="form-control" placeholder="Title" value="{{$portfolio->project_name}}">
        </div>
        <div class="form-group">
            <label for="title">Body:</label>
            <textarea name="project_desc" id="summernote" class="form-control">{!!$portfolio->project_desc!!}</textarea>
        </div>
        <div class="form-group">
            <label for="project_type">Project Type</label>
            <input type="text" class="form-control" name="project_type" placeholder="eg: Websites" value="{{ucfirst($portfolio->project_type)}}">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <label for="cover_image">Cover Image:</label>
                    @if($portfolio->cover_image)
                    <img src="/storage/portfolio/{{$portfolio->cover_image}}" alt="Portfolio Cover Image" class="img-circle img-responsive" width="150px">
                    <br>
                    <br>
                    @endif
                    <div id="dropZ">
                        <div class="selectFile">
                        <label for="file">Select file</label>
                        <input type="file" name="cover_image" id="file">
                        </div>
                        <p>File size limit : 10 MB</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="">
                    <label for="project_img">Project Images:</label>
                    <div id="dropZ">
                        <div class="selectFile">
                        <label for="file">Select file</label>
                        <input type="file" name="project_img" id="project_img" multiple>
                        </div>
                        <p>File size limit : 10 MB</p>
                    </div>
                </div>
            </div> -->
        </div>



        <div class="from-group">
            <label for="client">Client Name</label>
            <input type="text" class="form-control" id="client" name="client" placeholder="Client" value="{{$portfolio->client}}">
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-simple" href="{{route('index.adminportfolio')}}">Cancel</a>
    </form>
              </div>
            </div>
</div>
@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){
        $('#portfolio').attr('class', 'active');
        $('#summernote').summernote({
            placeholder: 'Body',
            tabsize: 2,
            height: 300
        });
    });
    $(document).bind('dragover', function (e) {
        var dropZone = $('.zone'),
            timeout = window.dropZoneTimeout;
        if (!timeout) {
            dropZone.addClass('in');
        } else {
            clearTimeout(timeout);
        }
        var found = false,
            node = e.target;
        do {
            if (node === dropZone[0]) {
                found = true;
                break;
            }
            node = node.parentNode;
        } while (node != null);
        if (found) {
            dropZone.addClass('hover');
        } else {
            dropZone.removeClass('hover');
        }
        window.dropZoneTimeout = setTimeout(function () {
            window.dropZoneTimeout = null;
            dropZone.removeClass('in hover');
        }, 100);
    });



</script>
@endsection
