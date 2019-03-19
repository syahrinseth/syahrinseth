@extends('Layouts.master')
@section('title', ucfirst($MasterBlog->title))
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
                        @if(Auth::user())
                            @if(Auth::user()->user_type == "admin")
                                <a class="dropdown-item" href="{{route('edit.adminblog', [ 'id' => $MasterBlog->id ])}}">Edit</a>
                            @endif
                        @endif
                        <hr>
                        <div class="panel">
                            <div class="panel-body">
                                <img class="panel-img-top cover-img" src="{{str_replace('public', 'storage', $MasterBlog->cover_img)}}" alt="Card image cap" width="400px">
                                <p>{!!$MasterBlog->body!!}</p>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Comment:</h5>
                                        <form action="{{route('create_blog_comment.blog', [ 'id' => $MasterBlog->id ])}}" method="post">
                                            <div class="form-group">
                                                <label for="name-{{$MasterBlog->id}}">Name</label>
                                                <input type="text" name="name" id="name-{{$MasterBlog->id}}" class="form-control" placeholder="Comment as...">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment-{{$MasterBlog->id}}">Comment</label>
                                                <textarea name="body" id="body-{{$MasterBlog->id}}" cols="30" rows="10" class="form-control" placeholder="Comment here..."></textarea>
                                            </div>
                                            <br>
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-success btn-sm pull-right">Post</button>
                                        </form>
                                        <br>
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        @if(count($blogComments) > 0)

                                                <h5>Comments:</h5>
                                                @foreach($blogComments as $blogComment)
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <label for="">Name:</label>
                                                        <br>
                                                        <input type="text" class="form-control" value="{{$blogComment->name}}" readonly>

                                                        <br>
                                                        <label for="">Comment:</label>
                                                        <br>
                                                        <textarea name="" id="" cols="30" rows="3" class="form-control"  readonly>{{$blogComment->body}}</textarea>
                                                        <br>
                                                        <small class="pull-right">{{App\BlogComment::whenCreated($blogComment->created_at)}}</small>
                                                    </div>
                                                </div>
                                                @endforeach

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>You May Also Like:</h3>
                        <div class="row">
                            @foreach($postsRand as $post)
                            <div class="col-md-4">
                            <a href="{{route('show.blog', ['slug'=>$post->slug])}}" title="{{ucfirst($post->title)}}">
                                <div class="panel" style="width: 20rem;">
                                    <img class="panel-img-top" src="{{str_replace('public', 'storage', $post->cover_img)}}" alt="Card image cap" width="100%">
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
        $('a[id="blog-nav"]').attr('class', 'active');
    });
</script>
@endsection
