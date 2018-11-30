@foreach(['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-'.$msg))
        <div class="alert alert-{{$msg}} landing-alert alert-dismissible">
            <div class="container text-center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:unset;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>{{ Session::get('alert-' . $msg) }}</h3>
            </div>
        </div>
    @endif
@endforeach
