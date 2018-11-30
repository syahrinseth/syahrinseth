@extends('Layouts.master')
@section('title', 'Blog')
@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1>{{ucfirst($MasterBlog->title)}}</h1>
                        <h6>by <strong>{{$MasterBlog->author}}</strong></h6>
                        <p>{{\Carbon\Carbon::createFromTimeStamp(strtotime($MasterBlog->created_at))->formatLocalized('%A %d %B %Y')}}</p>
                        @if(Auth::user()->user_type == "admin")
                            <a class="dropdown-item" href="{{route('edit.adminblog', [ 'id' => $MasterBlog->id ])}}">Edit</a>
                        @endif
                        <hr>
                        <div class="panel">
                            <div class="panel-body">
                                <img class="panel-img-top cover-img" src="/storage/blog/{{$MasterBlog->id}}/{{$MasterBlog->cover_img}}" alt="Card image cap" width="400px">
                                <p>{!!$MasterBlog->body!!}</p>
                            </div>
                        </div>
                        <hr>
                        <h3>You May Also Like:</h3>
                        <div class="row">
                            @foreach($postsRand as $post)
                            <div class="col-md-4">
                            <a href="{{route('show.blog', ['slug'=>$post->slug])}}" title="{{ucfirst($post->title)}}">
                                <div class="panel" style="width: 20rem;">
                                    <img class="panel-img-top" src="/storage/blog/{{$post->id}}/{{$post->cover_img}}" alt="Card image cap" width="100%">
                                    <div class="panel-body">
                                        <p class="panel-text">{{ucfirst($post->title)}}</p>
                                    </div>
                                </div>
                            </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){

    });
</script>
@endsection
