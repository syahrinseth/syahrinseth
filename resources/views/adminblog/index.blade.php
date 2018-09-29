@extends('Layouts.master-admin')
@section('title', 'Blog')
@section('content')
<div class="content">
</div>
@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){
        $('#blog').attr('class', 'active');
    });
</script>
@endsection