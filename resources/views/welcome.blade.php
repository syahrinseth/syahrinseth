@extends('Layouts.master')
@section('title', 'Home')
@section('content')
<div class="wrapper">
        <div class="landing-header" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url('../assets/paper_img/coding-wallpaper2.jpg');">
            <div class="container">
                <div class="motto text-white" style="text-align:center;">
                    <!-- <h1 class="title-uppercase text-inline">Syahrin Seth</h1> -->
                    <img src="../assets/paper_img/syahrinseth-logo-web.png" alt="" style="width:280px;">
                    <br>
                    <br>
                    <!-- <h2 class="text-white text-inline">A Software Engineer &<br></h2>
                    <h2 class="text-white text-inline">Martial Artists<br></h2> -->
                    <!-- <h3 class="text-white text-right"><code>I design and code Web & Mobile Applications to life.</code></h3> -->
                    <br />
                    <div class="row">
                        <div class="col-xs-3"></div>
                        <div class="col-xs-2">
                            <a href="https://www.instagram.com/syahrinseth" target="_blank" class=""><i class="fab fa-instagram fa-2x"></i></a>
                        </div>
                        <div class="col-xs-2">
                            <a href="https://www.github.com/syahrinseth" target="_blank" class=""><i class="fab fa-github fa-2x"></i></a>
                        </div>
                        <div class="col-xs-2">
                            <a href="https://www.linkedin.com/in/syahrinseth/" target="_blank" class=""><i class="fab fa-linkedin fa-2x"></i></a>
                        </div>
                        <div class="col-xs-3"></div>
                    </div>




                    <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary"><i class="fa fa-play"></i>Watch video</a> -->
                    <!-- <a class="btn btn-danger">Web Application Development</a>
                    <a class="btn btn-danger">Wordpress CMS</a> -->
                    <!-- <a class="btn btn-primary">Mobile Application Development</a> -->
                </div>
            </div>
        </div>
        <div class="main">
            <div class="section text-center landing-section">
                <div class="container">
                    <div class="row" id="services">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Services</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6" id="website-design">
                            <div><i class="fab fa-wordpress fa-7x"></i></div>
                            <h2>Website Design</h2>
                            <h5>Wordpress is web software that allows you to manage your own content, log into your website to blog, and upload media and update your own website. The websites I design will incorporate Wordpress so you can change your site anytime you want, at no cost.</h5>
                            <br />
                            <a href="{{route('/')}}#contact" class="btn">Contact Me</a>
                        </div>
                        <div class="col-md-6" id="webdev">
                            <div><i class="fas fa-laptop-code fa-7x"></i></div>
                            <h2>Web Applications Development</h2>
                            <h5>I design and develop responsive custom web applications that looks great on your desktop computer, tablet and mobile devices. I also use laravel to develop web application with CMS according to the client needs.</h5>
                            <br />
                            <a href="{{route('/')}}#contact" class="btn">Contact Me</a>
                        </div>
                        <!-- <div class="col-md-6" id="mobile-application-development">
                            <div><i class="fas fa-mobile fa-7x"></i></div>
                            <h2>Mobile Applications Development</h2>
                            <h5></h5>
                            <br />
                            <a href="{{route('/')}}#contact" class="btn">Contact Me</a>
                        </div> -->
                        <div class="col-md-6" id="martial-arts-coaching">
                            <div><i class="fas fa-stopwatch fa-7x"></i></div>
                            <h2>Taekwon-do and Kickboxing Personal Training</h2>
                            <h5></h5>
                            <br />
                            <a href="{{route('/')}}#contact" class="btn">Contact Me</a>
                        </div>

                        <!-- <div class="col-md-4" id="graphicdesign">
                            <div><i class="fas fa-pencil-alt fa-7x"></i></div>
                                <h2>Graphic Design</h2>
                                <h5>Graphic design is the process of visual communication and problem-solving through the use of typography, photography and illustration. I create an awesome design that catches viewers eyes on printable media to help boost client business.</h5>
                                <br />
                                <a href="{{route('/')}}#contact" class="btn btn-primary">Contact Me</a>
                        </div> -->
                    </div>

                </div>
            </div>


            <div class="section section-primary landing-section text-center">
                <div class="container">
                    <div class="row">
                    <h2>My Recent Work</h2>
                    <div id="carousel">
                        @if(count($portfoliosRand) > 0)
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel slide" data-ride="carousel">


                                <!-- Indicators -->
                                    @php
                                        $counter = 0;
                                    @endphp
                                <ol class="carousel-indicators">
                                    @foreach($portfoliosRand as $item)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$counter}}" class="{{$counter == 0 ? 'active' : ''}}"></li>
                                    @php
                                        $counter++;
                                    @endphp
                                    @endforeach
                                </ol>


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach($portfoliosRand as $item)
                                    <div class="item {{$counter == 0 ? 'active' : ''}}">
                                        <a href="#" data-toggle="modal" data-target="#id-{{$item->id}}" class="pointer">
                                            <img src="/storage/{{$item->cover_image}}" alt="Awesome Image" >
                                        </a>
                                    </div>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
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
                            <a href="{{route('index.portfolio')}}" class="btn btn-danger">More</a>
                        @else
                            <h6>Coming Soon...</h6>
                        @endif


                    </div>
                </div>
            </div>

</div>


            <div class="section text-center landing-section">
                <div class="container" id="aboutme">
                    <h2>About Me</h2>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="team-player">
                            <img src="../assets/paper_img/syahrinseth2.jpg" alt="Thumbnail Image" class="img-circle img-responsive">
                            <h5>Syahrin Seth <br /><small class="">Software Engineer & Martial Artist</small></h5>
                            <!-- <h6>I'm Syah, a Web Application Developer and Photographer based in Shah Alam, MY.</h6> -->
                            <p class="text-center">Syahrin Seth is a software engineer and martial artist, who currently working as a software engineer who specialised in web and mobile application development. He is also a martial arts coach who train people taekwon-do and kickboxing.<br>
                            </p>

                        </div>
                    </div>
                </div>
            </div>





            <div class="section landing-section section-primary text-center">
                <div class="container">
                    <div class="row">
                        <h2>My Startup Projects</h2>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <!-- <div class="jumbotron text-primary">
                                <h1 class="display-4">Ingredientz</h1>
                                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                                <hr class="my-4">
                                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                                <a class="btn btn-primary btn-lg" href="#" role="button">www.ingredientz.com</a>
                            </div> -->

                            <div class="jumbotron text-primary">
                                <h3 class="display-4">
                                <img src="assets/paper_img/Ingredientz_logo_syahrinseth.png" width="100%" style="border-radius:10px"></h3>
                                <h2 class="lead">Coming Soon.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section landing-section text-center">
                <div class="container">
                    <div class="row">
                        <h3>I'm proud to have collaborated<br> with some awesome companies</h3>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 img-client-section">
                            <a href="https://www.ge.com/power" target="_blank" class="img-client"><img src="/assets/img/clients/syahrinseth-gepower.png" style="width:150px;"></a>
                        </div>
                        <div class="col-md-6 img-client-section">
                            <a href="http://www.pheontech.com" target="_blank" class="img-client"><img src="/assets/img/clients/syahrinseth-pheontech.png" style="width:150px;"></a>
                        </div>
                        <div class="col-md-6 img-client-section">
                            <a href="http://www.noorarfa.com/" target="_blank" class="img-client"><img src="/assets/img/clients/syahrinseth-noorarfa.png" style="width:150px;"></a>
                        </div>
                        <div class="col-md-6 img-client-section">
                            <a href="#" class="img-client" target="_blank"><img src="/assets/img/clients/syahrinseth-umlivinglabsystem.png" style="width:150px;"></a>
                        </div>
                        <div class="col-md-6 img-client-section">
                            <a href="#" class="img-client" target="_blank"><img src="/assets/img/clients/syahrinseth-ifctaekwondo.png" style="width:70px;"></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section-nogradient landing-section section-dark">
                <div class="container">
                    <div class="row" id="contact">
                        <div class="col-md-8 col-md-offset-2">
                            <h3 class="text-center">Thanks for taking the time to<br> reach out. What can I do for you<br> today?</h3>
                            <form class="contact-form" method="post" action="{{route('contactSend')}}">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" placeholder="Message" name="message"></textarea>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@foreach($portfoliosRand as $item)
<div class="modal fade" id="id-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">{{$item->project_name}}</h4>
      </div>
      <div class="modal-body">
          <h6>Description:</h6>
        {!!$item->project_desc!!}
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
@endforeach


@endsection
@section('custom-javascript')
    <script>
        $(document).ready(function(){
            $('a[id="home-nav"]').attr('class', 'active');
        });
    </script>
@endsection
@section('custom-css')
<style>
    .img-client-section{
        height: 100px;
    }
    .img-client{
        height: 90px;
        width: 300px;
        padding: 9%;
        margin: auto;
    }
</style>
@endsection
