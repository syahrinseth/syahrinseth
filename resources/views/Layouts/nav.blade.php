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
                    <img src="../assets/paper_img/s-logo-white.png" alt="Thumbnail Image" class="img-responsive">
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
                <a href="{{route('/')}}" class="">Home</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Services <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{route('/')}}#webdev">Custom Web Development</a></li>
                <li><a href="{{route('/')}}#wordpress">Wordpress Development</a></li>
                <!-- <li><a href="{{route('/')}}#graphicdesign">Graphic Design</a></li> -->
                </ul>
            </li>
            <li>
                <a href="{{route('index.portfolio')}}" class="">Portfolio</a>
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
            <!-- <li>
                <a href="#" class="">Blog</a>
            </li> -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">About <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{route('/')}}#aboutme">About Me</a></li>
                <li><a href="{{route('/')}}#contact">Contact Me</a></li>
                <li class="divider"></li>
                <li><a href="https://www.instagram.com/syahrinseth" target="_blank" class="">Instagram <i class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/in/syahrinseth/" target="_blank" class="">Linkedin <i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://www.github.com/syahrinseth" target="_blank" class="">GitHub <i class="fab fa-github"></i></a></li>
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
