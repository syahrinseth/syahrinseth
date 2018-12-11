@extends('Layouts.master')
@section('title', 'Portfolio')
@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section" style="min-height:700px;">
            <h2 class="text-center">Portfolio</h2>



            @if(count($portfolios) > 0)
            <div class="container">
                <div class="row text-center">
                    <div class="toolbar mb2 mt2">
                        @if(count($portfolio_tabs) > 0)
                            <button class="btn btn-primary portfoliotab" id="All-portfoliotab" data-rel="all">All</button>
                            @foreach($portfolio_tabs as $item)
                                <button class="btn btn-primary portfoliotab" id="{{$item->project_type}}-portfoliotab" data-rel="{{$item->project_type}}">{{ucfirst(str_replace('_', ' ', $item->project_type))}}</button>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div id="portfolio">
                        @if(count($portfolios) > 0)
                            @foreach($portfolios as $item)
                                <div class="tile scale-anm {{$item->project_type}} all">
                                    @if($item->cover_image != null)
                                        <a href="#" data-toggle="modal" data-target="#portfolio_modal" class="pointer portfolio-pointer" id="{{$item->id}}">
                                        <img src="storage/portfolio/{{$item->cover_image}}" alt="{{pathinfo($item->cover_image, PATHINFO_FILENAME)}}" /></a>
                                    @else
                                        <img src="http://demo.themerain.com/charm/wp-content/uploads/2015/04/2-mon_1092-300x234.jpg" alt="" />
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div style="clear:both;"></div>


                </div>
            </div>
            @else
            <div class="container">
                <div class="row text-center">
                    <div class="panel">
                        <div class="panel-body">
                            Coming Soon.
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- end model 1 -->
<div class="modal fade" id="portfolio_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="portfolio_modal_title"></h4>
        <h6 id="portfolio_modal_projecttype"></h6>
      </div>
      <div class="modal-header">
          <img src="" id="portfolio_modal_coverimage" class="img-fluid text-center" alt="" width="50%" style="display: block;margin-left: auto;margin-right: auto;">
      </div>
      <div class="modal-body" id="portfolio_modal_projectdesc">
          No Data.
      </div>
      <div>
          <div class="row" id="portfolio_modal_moredesc">

          </div>
      </div>
      <!-- <div class="modal-footer">
        <div class="left-side">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never mind</button>
        </div>
        <div class="right-side">
            <button type="button" class="btn btn-danger btn-simple">Delete</button>
        </div>
      </div> -->
    </div>
  </div>
</div>

@endsection
@section('custom-javascript')
<script>
    $(document).ready(function(){
        $('button#All-portfoliotab').addClass("active");

        @if(count($portfolio_tabs) > 0)
            $(document).on('click', 'button#All-portfoliotab', function(){
                $('button.portfoliotab').removeClass("active");
                $(this).addClass("active");
            });
            @foreach($portfolio_tabs as $item)
                $(document).on('click', 'button#{{$item->project_type}}-portfoliotab', function(){
                    $('button.portfoliotab').removeClass("active");
                    $(this).addClass("active");
                });
            @endforeach

        @endif

        $(document).on('click', 'a.portfolio-pointer', function(){
            var id = $(this).attr('id');
            if(id != null){
                $.ajax({
                    url: "/portfolio/ajax/" + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(result){
                        console.log(result);
                        var jsonStr = JSON.stringify(result);
                        var obj = JSON.parse(jsonStr);
                        if(obj.length > 0){
                            $('h4#portfolio_modal_title').html(obj[0].project_name);
                            $('div#portfolio_modal_projectdesc').html('<h6>Project Description:</h6><br>'+obj[0].project_desc);
                            $('h6#portfolio_modal_projecttype').html(obj[0].project_type);
                            $('img#portfolio_modal_coverimage').attr('src', '/storage/portfolio/' + obj[0].cover_image);
                            $.each(obj, function(i,item){
                                if(item.id != null){
                                    $('div#portfolio_modal_moredesc').append('<div class="col-md-6 moreimages"><img src="/storage/portfolio/desc/' + item.project_img + '" class="img-fluid text-center" alt="" width="50%"></div>');
                                }
                            });
                        }


                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            }else{
                console.log('ID is NULL');
            }

        });

});
</script>
@endsection


