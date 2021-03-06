<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{route('index.adminblog')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="/assets/paper_img/s-logo-blue.png" alt="Thumbnail Image" class="img-responsive">
          </div>
        </a>
        <a href="{{route('dashboard')}}" class="simple-text logo-normal">
          {{ucfirst(Auth::user()->name)}}
          <!-- <div class="logo-image-big">
            <img src="../admin-assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="dashboard">
            <a href="{{route('dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li id="blog">
            <a href="{{route('index.adminblog')}}">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Blog</p>
            </a>
          </li>
          <li id="portfolio">
            <a href="{{route('index.adminportfolio')}}">
              <i class="nc-icon nc-paper"></i>
              <p>Portfolio</p>
            </a>
          </li>
          <!-- <li id="services">
            <a href="./notifications.html">
              <i class="nc-icon nc-laptop"></i>
              <p>Services</p>
            </a>
          </li> -->
          <!-- <li id="visitors">
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>Visitors</p>
            </a>
          </li> -->
          <li id="tracker">
            <a href="/stats" target="_blank">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Tracker</p>
            </a>
          </li>
          <!-- <li id="my-profile">
            <a href="./tables.html">
              <i class="nc-icon nc-badge"></i>
              <p>My Profile</p>
            </a>
          </li> -->
          <li id="logout" class="active-pro">
            <a href="{{route('logout')}}">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
