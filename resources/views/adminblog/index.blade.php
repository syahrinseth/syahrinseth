@extends('Layouts.master-admin')
@section('title', 'Blog')
@section('content')
<div class="content">
    @include('Layouts.message-admin')
    @include('Layouts.validate-admin')
    <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Blog Posts</h4>
                 <a href="{{route('create.adminblog')}}" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Post</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="posts_list">
                    <thead class=" text-primary">
                      <tr><th>
                        Title(s)
                      </th>
                      <th>
                        Category(s)
                      </th>
                      <th>
                        Author(s)
                      </th>
                      <th>
                        Updated At
                      </th>
                      <th class="">
                        Created At
                      </th>
                      <th>
                        Total View(s)
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Action
                      </th>
                    </tr></thead>
                    <tbody>
                    @foreach($MasterBlogs as $MasterBlog)
                      <tr>
                        <td>
                          {{ucfirst($MasterBlog->title)}}
                        </td>
                        <td>
                            @php
                                $master_category = App\masterCategoriesModel::find($MasterBlog->mastercategories_id);
                            @endphp
                            {{$master_category->category}}
                        </td>
                        <td>
                          {{$MasterBlog->author}}
                        </td>
                        <td class="">
                          {{\Carbon\Carbon::createFromTimeStamp(strtotime($MasterBlog->updated_at))->formatLocalized('%d %B %Y')}}
                        </td>
                        <td>
                            {{\Carbon\Carbon::createFromTimeStamp(strtotime($MasterBlog->created_at))->formatLocalized('%d %B %Y')}}
                        </td>
                        <td>
                            {{$MasterBlog->total_views}}
                        </td>
                        <td>
                            @if($MasterBlog->publish == 1)
                                Published
                            @else
                                Unpublished
                            @endif
                        </td>
                        <td>
                            <a class="nav-link btn btn-simple btn-sm nc-icon nc-settings-gear-65" href="http://example.com" id="navbarDropdownMenuLinkCustom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLinkCustom">
                                <a class="dropdown-item" href="{{route('show.blog', [ 'slug' => $MasterBlog->slug ])}}" target="_blank">View</a>
                                <a class="dropdown-item" href="{{route('edit.adminblog', [ 'id' => $MasterBlog->id ])}}">Edit</a>
                                <a class="dropdown-item" href="{{route('delete.adminblog', ['id' => $MasterBlog->id])}}">Delete</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                    <div class="pull-right">
                        {!! $MasterBlogs->links() !!}
                    </div>
                </div>
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
