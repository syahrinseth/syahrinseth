@extends('Layouts.master-admin')
@section('title', 'Blog')
@section('content')
<div class="content">
    <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Blog Posts</h4>
                 <a href="{{route('blogAdmin.create')}}" class="btn btn-simple btn-sm"><i class="fas fa-plus"></i> New Post</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
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
                        Action
                      </th>
                    </tr></thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Syahrin
                        </td>
                        <td class="">
                          $36,738
                        </td>
                        <td>
                            date
                        </td>
                        <td>
                            212
                        </td>
                        <td>
                            <a href="#" class="btn btn-simple btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-simple btn-sm"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-simple btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
