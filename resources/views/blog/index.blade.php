@extends('Layouts.master')
@section('title', 'Blog')
@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                @if(count($MasterBlogs) > 0)
                    @foreach($MasterBlogs as $MasterBlog)
                        <div class="row">
                            <div class="col-md-10">
                                <h1><a href="{{route('show.blog', [ 'slug' => $MasterBlog->slug ])}}">{{ucfirst($MasterBlog->title)}}</a></h1>
                                <h6>by <strong>{{$MasterBlog->author}}</strong></h6>
                                <p>{{\Carbon\Carbon::createFromTimeStamp(strtotime($MasterBlog->created_at))->formatLocalized('%A %d %B %Y')}}</p>
                                @if(Auth::user() != null)
                                    @if(Auth::user()->user_type == "admin")
                                        <a class="dropdown-item" href="{{route('edit.adminblog', [ 'id' => $MasterBlog->id ])}}">Edit</a>
                                    @endif
                                @endif
                                <hr>
                                <div class="panel">
                                    <div class="panel-body">
                                        <img class="panel-img-top cover-img" src="{{str_replace('public', 'storage', $MasterBlog->cover_img)}}" alt="Card image cap" width="400px">
                                        @php
                                            // strip tags to avoid breaking any html
                                            $body = strip_tags($MasterBlog->body);
                                            if (strlen($body) > 500) {

                                                // truncate string
                                                $stringCut = substr($body, 0, 500);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $body = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $route = route('show.blog', [ 'slug' => $MasterBlog->slug ]);
                                                $body .= '... <a href="'.$route.'">Read More</a>';
                                            }
                                        @endphp
                                        <p>{!!$body!!}</p>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-10">
                                <div style="float:right">
                                    {!! $MasterBlogs->links() !!}
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="row" style="height:500px;">
                            <div class="col-md-10">
                                <h1>Sorry, what you looking for are not here...</h1>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('custom-javascript')
<script>
    jQuery(document).ready(function(){
        $('a[id="blog-nav"]').attr('class', 'active');
    });
</script>
@endsection
