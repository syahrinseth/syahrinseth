@extends('Layouts.master')
@section('title', 'Home')
@section('content')
@include('Layouts.message')
@include('Layouts.validate')
<div class="wrapper">
        <div class="landing-header" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),url('../assets/paper_img/coding-wallpaper.jpg');">
            <div class="container">
                <div class="motto text-white text-center">
                    <h1 class="text-white text-inline">Hello! I'm </h1> <h1 class="title-uppercase text-inline">{ <code>Syahrin Seth</code> }.</h1>
                    <br>
                    <br>
                    <h2 class="text-white text-inline">
                    I'm a</h2><h2 class="text-white text-inline"> Full Stack Web Developer.</h2>
                    <h4 class="text-white">I build things with code.</h4>
                    <br />
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
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Services</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6" id="webdev">
                            <div><i class="fas fa-laptop-code fa-7x"></i></div>
                            <h2>Web Application Development</h2>
                            <h5>I design and develop responsive websites and web applications that looks great on your desktop computer, tablet and mobile devices.</h5>
                            <br />
                            <a href="{{route('/')}}#contact" class="btn btn-primary">Contact Me</a>
                        </div>
                        <div class="col-md-6" id="wordpress">
                            <div><i class="fab fa-wordpress fa-7x"></i></div>
                                <h2>Wordpress CMS</h2>
                                <h5>Wordpress is web software that allows you to manage your own content, log into your website to blog, and upload media and update your own website. The websites I create incorporate Wordpress so you can change your site anytime you want, at no cost.</h5>
                                <br />
                                <a href="{{route('/')}}#contact" class="btn btn-primary">Contact Me</a>
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
                    <div class="col-md-10 col-md-offset-1">
                        <div class="team-player">
                            <img src="../assets/paper_img/syahrinseth2.jpg" alt="Thumbnail Image" class="img-circle img-responsive">
                            <h5>Syahrin Seth <br /><small class="text-muted">Web Application Developer</small></h5>
                            <!-- <h6>I'm Syah, a Web Application Developer and Photographer based in Shah Alam, MY.</h6> -->
                            <p class="text-center">Hello, my name is Syahrin Seth, and I'm a Web Developer. I graduated from Management and Science University and acquired a Bachelor in Bioinformatics (Hons). I work at University Malaya for 3 months and develop Kids Fracture System by using PHP with Laravel Framework. The application objectives are to store patients database and predict the healing process of the patients to help doctors make a decision for treating the patients. Later, I work as a freelance web developer under Rich Core Media and design a website with e-commerce include for Noor Arfa by using Wordpress. Later, I work at PheonTech Sdn. Bhd. as a web developer. My recent projects involve in developing a websites and web applications for General Electric (GE POWER) to improve their business by using technology such as PHP (Laravel Framework), HTML/CSS (Bootstrap), Javascript (jQuery, React Native), SQL (MySQL, SQL Server), and C# ASP.NET Core.
                            *I have a year of experience in Web Development and very skilled in HTML/CSS (Bootstrap), Javascript (jQuery), PHP (Laravel 5) and  MySQL.
                            *I have a respect for working hour and deadline.</p>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <h4>Tech Skills Highlights</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th> Technologies </th>
                                                    <th> Skills </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-left">
                                                    <td> HTML 5 </td>
                                                    <td> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> CSS 3 </td>
                                                    <td> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> Bootstrap 4 </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> Javascript </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> PHP </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> C# </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> SQL </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> jQuery  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> Laravel 5  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> ASP.NET Core MVC  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> React Native  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> MySQL  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> SQLite  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></i><i class="far fa-star"></i> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td> SQL Server  </td>
                                                    <td class="text-left"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> </td>
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section section-light-brown landing-section text-center">
                <div class="container">
                    <div class="row">
                        <h2>Clients</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="https://www.ge.com/power" target="_blank"><img src="/assets/img/clients/syahrinseth-gepower.png" style="width:250px"></a>
                        </div>
                        <div class="col-md-6">
                            <a href="http://www.pheontech.com" target="_blank"><img src="/assets/img/clients/syahrinseth-pheontech.png" style="width:250px"></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section landing-section">
                <div class="container">
                    <div class="row" id="contact">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Keep in touch?</h2>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Company</label>
                                        <input class="form-control" placeholder="Company" name="company">
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" placeholder="Message" name="message"></textarea>
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
