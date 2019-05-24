<nav class="navbar navbar-ct-primary" role="navigation-demo" id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="www.creative-tim.com">Syahrin Seth</a> -->
          <a href="/" >
           <div class="logo-container">
                <div class="logo-main">
                    <img src="/assets/paper_img/s-logo-white.png" alt="Thumbnail Image" class="img-responsive">
                </div>
                <div class="brand">
                    SYAHRIN SETH
                </div>
            </div>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{route('/')}}" class="" id="home-nav">Home</a>
            </li>
            <li>
                <a href="{{route('index.portfolio')}}" class="" id="portfolio-nav">Portfolio</a>
                <!-- <ul class="dropdown-menu">
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Photo Gallery</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
                </ul> -->
            </li>
            <li>
                <a href="{{route('index.blog')}}" class="" id="blog-nav">Blog</a>
            </li>
            <li>
                <a href="{{route('/')}}#services" class="" id="services-nav">Services</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">More <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{route('/')}}#aboutme">About Me</a></li>
                <li><a href="{{route('/')}}#contact">Contact Me</a></li>
                <li class="divider"></li>
                <li><a href="{{route('miniGames.colorGame', ['gameName' => 'COLORGAME'])}}" target="_blank"><i class="fas fa-gamepad"></i> Mini Games</a></li>
                <li><a href="https://www.github.com/syahrinseth" target="_blank" class=""><i class="fab fa-github"></i> GitHub</a></li>
                <li><a href="https://www.instagram.com/syahrinseth" target="_blank" class=""><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a href="https://www.linkedin.com/in/syahrinseth/" target="_blank" class=""><i class="fab fa-linkedin"></i> Linkedin</a></li>
                <li class="divider"></li>
                @if(Auth::user())
                <li><a href="{{route('dashboard')}}"> Admin Dashboard</a></li>
                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                @else
                <li><a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                @endif
                <!-- <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li> -->
                </ul>
            </li>
            <!-- <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>

                  <ul class="dropdown-menu">

                    <li><a href="#" class="" style="color:#66615b">Blog</a></li>

                    <li><a href="#" class="">Contact</a></li>

                    <li class="divider"></li>

                    <li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>

                    <li class="divider"></li>

                    <li><a href="#">One more separated link</a></li>

                  </ul>

            </li> -->



            <!-- <li>
                <a href="https://www.youtube.com/syahrinseth" target="_blank" class=""><i class="fa fa-youtube"></i></a>
            </li> -->
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>
