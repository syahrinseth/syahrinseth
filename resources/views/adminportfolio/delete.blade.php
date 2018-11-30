@extends('Layouts.master-admin')
@section('title', 'Delete Portfolio')
@section('content')
<div class="content">
    <div class="card">
            <div class="card-body">
                <form action="{{route('destroy.adminportfolio', ['id' => $master_portfolio->id])}}" method="post">
                    <h5>Are you sure to delete {{ucfirst($master_portfolio->project_name)}}?<h5>
                    <hr>
                    <a href="{{route('index.adminportfolio')}}" class="btn btn-default btn-sm">Cancel</a>
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
        $('#portfolio').attr('class', 'active');

    });
</script>
@endsection
