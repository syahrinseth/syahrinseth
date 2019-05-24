@extends('Layouts.master')
@section('title', ucfirst($MasterBlog->title))
@section('content')

<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
                                @if($MasterBlog->cover_img != null)
                                    <img class="panel-img-top cover-img" src="{{str_replace('public', 'storage', $MasterBlog->cover_img)}}" alt="Card image cap" width="400px">
                                @endif
                                @if($MasterBlog->body != null)
                                    <p>{!!$MasterBlog->body!!}</p>
                                @endif
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
                                                        <form action="{{route('delete_blog_comment.blog', ['id' => $blogComment->id])}}" id="delete-blog-comment-{{$blogComment->id}}" method="post">
                                                        {{csrf_field()}}
                                                        </form>
                                                        <button class="btn btn-danger btn-small pull-right btn-delete-comment" id="btn-delete-blog-comment-{{$blogComment->id}}">Delete</button>
                                                        <br>
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
                                    @if($post->cover_img != null)
                                        <img class="panel-img-top" src="{{str_replace('public', 'storage', $post->cover_img)}}" alt="Card image cap" width="100%">
                                    @endif
                                    <div class="panel-body">
                                        <p class="panel-text">{{ucfirst($post->title)}}</p>
                                    </div>
                                    <div class="panel-footer">
                                        @php
                                            // strip tags to avoid breaking any html
                                            $body = $post->body;
                                            if (strlen($body) > 100) {

                                                // truncate string
                                                $stringCut = substr($body, 0, 100);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $body = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $route = route('show.blog', [ 'slug' => $post->slug ]);
                                                $body .= '... <a href="'.$route.'">Read More</a>';
                                            }
                                        @endphp
                                        {!!$body!!}
                                        <p></p>
                                    </div>
                                </div>
                            </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="col-md-2">

                    </div> -->
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

        // Delete comment function
        $(document).on('click', 'button.btn-delete-comment', function(){
            console.log($(this).attr('id'));
            var id = $(this).attr('id');
            var idValue = id.split("-");
            if (confirm('Are you sure you want to delete this comment?')) {
                // Delete it!
                $( "form#delete-blog-comment-" + idValue[4] ).submit();
            }
        });
    });
</script>
@endsection
