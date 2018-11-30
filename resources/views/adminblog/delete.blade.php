@extends('Layouts.master-admin')
@section('title', 'Delete Post')
@section('content')
<div class="content">
    <div class="card">
            <div class="card-body">
                <form action="{{route('destroy.adminblog', ['id' => $masterBlog->id])}}" method="post">
                    <h5>Are you sure to delete {{ucfirst($masterBlog->title)}}?<h5>
                    <hr>
                    <a href="{{route('index.adminblog')}}" class="btn btn-default btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    {{csrf_field()}}
                </form>
            </div>
    </div>
</div>
@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){
        $('#blog').attr('class', 'active');

    });
</script>
@endsection
