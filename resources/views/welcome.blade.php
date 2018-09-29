@extends('Layouts.master')
@section('title', 'Home')
@section('content')
<div class="wrapper">
        <div class="landing-header" style="background-image: url('../assets/paper_img/red.jpg');">
            <div class="container">
                <div class="motto text-primary">
                    <h1 class="title-uppercase text-primary">Syahrin Seth</h1>
                    <h3 class="text-primary">Web Application Developer</h3>
                    <br />
                    <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary"><i class="fa fa-play"></i>Watch video</a> -->
                    <p>What do you need?</p>
                    <a class="btn btn-primary">Custom Web Application Development</a>
                    <a class="btn btn-primary">Wordpress CMS</a>
                    <!-- <a class="btn btn-primary">Mobile Application Development</a> -->
                </div>
            </div>
        </div>
        <div class="main">
            <div class="section text-center landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Custom Web Application Development</h2>
                            <h5>I design and develop responsive websites or web applications that looks great on your desktop computer, tablet and mobile device.</h5>
                            <br />
                            <a href="#" class="btn btn-primary">See Details</a>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Wordpress CMS</h2>
                                <h5>Wordpress is web software that allows you to manage your own content, log into your website to blog, and upload media and update your own website. The websites I create incorporate Wordpress so you can change your site anytime you want, at no cost.</h5>
                                <br />
                                <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Graphic Design</h2>
                                <h5>Graphic design is the process of visual communication and problem-solving through the use of typography, photography and illustration. I create an awesome design that catches viewers eyes on printable media to help boost client business.</h5>
                                <br />
                                <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                        </div>
                        end row -->
                    </div>
                </div>
            </div>


            <div class="section section-light-brown landing-section text-center">
                <div class="container">
                    <div class="row">
                    <h2>Latest Work</h2>
                    <div id="carousel">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="#" data-toggle="modal" data-target="#oneModal" class="pointer">
                                    <img src="assets/paper_img/pencils.jpg" alt="Awesome Image" >
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" data-toggle="modal" data-target="#twoModal" class="pointer">
                                    <img src="assets/paper_img/shoes.jpg" alt="Awesome Image" class="pointer">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" data-toggle="modal" data-target="#threeModal" class="pointer">
                                    <img src="assets/paper_img/types.jpg" alt="Awesome Image" class="pointer">
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
                    <a href="#" class="btn btn-danger">More</a>
                    </div>
                </div>
            </div>

</div>


            <div class="section section-dark text-center landing-section">
                <div class="container">
                    <h2>About Me</h2>
                    <div class="col-md-12">
                        <div class="team-player">
                            <img src="../assets/paper_img/syahrinseth2.jpg" alt="Thumbnail Image" class="img-circle img-responsive">
                            <h5>Syahrin Seth <br /><small class="text-muted">Web Application Developer</small></h5>
                            <p>I'm Syah, a Web Application Developer and Photographer based in Shah Alam, MY.</p>
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9 text-left">
                                    <h4>Skills Highlight:</h4>
                                    <ul>
                                        <li>PHP (Laravel 5)</li>
                                        <li>HTML 5</li>
                                        <li>CSS 3</li>
                                        <li>Bootstrap 4</li>
                                        <li>Javascript (jQuery, React, React Native)</li>
                                        <li>SQL (MySQL, SQL Server)</li>
                                        <li>C# (Dotnet Core Entity Framework)</li>
                                        <li>Git (GitHub)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Keep in touch?</h2>
                            <form class="contact-form" method="post" action="{{route('contactSend')}}">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Company</label>
                                        <input class="form-control" placeholder="Company">
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-primary btn-block btn-lg">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="oneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
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
<div class="modal fade" id="twoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title 2</h4>
      </div>
      <div class="modal-body">
        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
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
<!-- end model 2 -->
<div class="modal fade" id="threeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title 3</h4>
      </div>
      <div class="modal-body">
        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
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
<!-- end model 3 -->
@endsection
@section('custom-javascript')

@endsection
