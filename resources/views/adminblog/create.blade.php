@extends('Layouts.master-admin')
@section('title', 'Blog Create New Post')
@section('content')
<div class="content">
    @include('Layouts.message-admin')
    @include('Layouts.validate-admin')
    <div class="card">
              <div class="card-header">
                <h4 class="card-title"> New Blog Post</h4>
                 <!-- <a href="{{route('blogAdmin.create')}}" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Post</a> -->
              </div>
              <div class="card-body">

    <form action="{{route('blogAdmin.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <textarea name="body" id="summernote" class="form-control"></textarea>
        </div>
        <h4 class="card-title">Category</h4>
        <div class="row">
            <div class="col-12">
                <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="category[]" value="">
                    PHP
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="category[]" value="">
                    Laravel
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="category[]" value="">
                    Terminal
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    </label>
                </div>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-simple" href="{{route('blogAdmin.index')}}">Cancel</a>
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
    });
</script>
@endsection
