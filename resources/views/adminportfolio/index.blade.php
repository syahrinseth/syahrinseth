@extends('Layouts.master-admin')
@section('title', 'Portfolio')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Portfolio</h4>
                    <a href="{{route('create.adminportfolio')}}" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Portfolio</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                  <table class="table" id="posts_list">
                    <thead class=" text-primary">
                      <tr><th>
                        Name(s)
                      </th>
                      <th>
                        Client(s)
                      </th>
                      <th>
                        Updated At
                      </th>
                      <th class="">
                        Created At
                      </th>
                      <th>
                        Action
                      </th>
                    </tr></thead>
                    <tbody>
                    @foreach($master_portfolios as $item)
                      <tr>
                        <td>
                          {{ucfirst($item->project_name)}}
                        </td>
                        <td>
                          {{$item->client}}
                        </td>
                        <td class="">
                          {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->formatLocalized('%d %B %Y')}}
                        </td>
                        <td>
                            {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->formatLocalized('%d %B %Y')}}
                        </td>
                        <td>
                            <a class="nav-link btn btn-simple btn-sm nc-icon nc-settings-gear-65" href="http://example.com" id="navbarDropdownMenuLinkCustom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLinkCustom">
                                <!-- <a class="dropdown-item" href="route('show.adminportfolio', [ 'id' => $item->id ])" target="_blank">View</a> -->
                                <a class="dropdown-item" href="{{route('edit.adminportfolio', [ 'id' => $item->id ])}}">Edit</a>
                                <a class="dropdown-item" href="{{route('delete.adminportfolio', ['id' => $item->id])}}">Delete</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                    <div class="pull-right">
                        {!! $master_portfolios->links() !!}
                    </div>
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
        $('#portfolio').attr('class', 'active');

    });
</script>
@endsection
