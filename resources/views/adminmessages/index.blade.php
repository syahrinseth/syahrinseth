@extends('Layouts.master-admin')
@section('title', 'Messages')
@section('content')
{{csrf_field()}}
<div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Contacts</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <!-- <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div> -->
                      @foreach($contacts as $contact)
                      <div class="col-md-9 col-9">
                        {{$contact->name}}
                        <br>
                        <span class="text-muted">
                          <small>{{\Carbon\Carbon::createFromTimeStamp(strtotime($contact->created_at))->diffForHumans()}}</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <a class="btn btn-sm btn-outline-success btn-round btn-icon open-envelope" href="#" id="openenvelope-{{$contact->id}}"><i class="fa fa-envelope"></i></a>
                      </div>
                      @endforeach
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Message</h5>
              </div>
              <div class="card-body" id="message-section">
                  <div class="row" id="message-read">
                      <div class="col-3"></div>
                      <div class="col-6">
                            <div class="alert alert-dark text-center">
                                <span>No Message Selected</span>
                            </div>
                      </div>
                      <div class="col-3"></div>
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
        $('#messages').attr('class', 'active');

        jQuery(document).on('click', 'a.open-envelope',function(e){
            var id = $(this).attr('id');
            var id = id.substring(id.indexOf("-") + 1);
            console.log(id);
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/admin-message/ajax/" + id,
                method: 'get',
                dataType: 'json',
                success: function(result){
                    console.log(result);
                    var jsonStr = JSON.stringify(result);
                    var obj = JSON.parse(jsonStr);
                    $('div#message-read').remove();
                    $('div#message-section').append('<div class="row" id="message-read"><div class="col-md-6"><div class="form-group"><label>Name</label><input type="text" class="form-control" placeholder="Username" value="' + obj.name + '" id="message-name" disabled></div></div><div class="col-md-6"><div class="form-group"><label>Company</label><input type="text" class="form-control" disabled="" placeholder="Company" id="message-company" value="' + obj.company + '"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Email address</label><input type="email" class="form-control" placeholder="Email" id="message-email" value="' + obj.email + '" disabled></div></div><div class="col-md-6"><div class="form-group"><label>Phone</label><input type="text" class="form-control" placeholder="Phone" value="' + obj.phone + '" id="message-phone" disabled></div></div><div class="col-md-12"><div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Home Address" value="Melbourne, Australia" id="message-textarea" disabled>' + obj.message + '</textarea></div></div></div>');
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
            });
        });
    });
</script>
@endsection
