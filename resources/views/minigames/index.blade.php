@extends('Layouts.master')
@section('title', 'Home')
@section('content')
<div class="wrapper">
        <div class="main">
            <div class="section text-center">
                <div class="container">
                    <div class="row">
                            <h2 class="text-center">Games</h2>
                        <div id="carousel">

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel slide" data-ride="carousel">


                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="" class=""></li>
                                </ol>


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href="#" data-toggle="modal" data-target="#id-" class="pointer">
                                            <img src="/assets/games/colorGames.png" alt="Awesome Image" >
                                        </a>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
                            </div>
                            </div> <!-- end carousel -->


                        </div>
                    </div>
                    </div>

                </div>
            </div>



        </div>
    </div>


<div class="modal fade" id="id-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">The Great RGB Color Game</h4>
      </div>
      <div class="modal-body">
          <h6>Description:</h6>
          <a href="{{route('miniGames.colorGame', ['gamename' => 'COLORGAME'])}}" class="btn btn-primary" target="_blank">Play</a>
      </div>
      <!-- <div class="modal-footer">
        <div class="left-side">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never mind</button>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <button type="button" class="btn btn-danger btn-simple">Delete</button>
        </div>
      </div> -->
    </div>
  </div>
</div>
<!-- end model 1 -->


@endsection
@section('custom-javascript')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
@section('custom-css')
<style>

</style>
@endsection
