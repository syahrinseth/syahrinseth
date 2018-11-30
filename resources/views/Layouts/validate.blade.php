@if(count($errors))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger landing-alert alert-dismissible">
            <div class="container text-center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:unset;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>{{ $error }}</h3>
            </div>
        </div>
    @endforeach
@endif
