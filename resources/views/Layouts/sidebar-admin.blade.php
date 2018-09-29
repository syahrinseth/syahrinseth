<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{route('dashboard')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/paper_img/s-logo-blue.png" alt="Thumbnail Image" class="img-responsive">
          </div>
        </a>
        <a href="{{route('dashboard')}}" class="simple-text logo-normal">
          Syahrin Seth
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
            <a href="{{route('blogAdmin.index')}}">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Blog</p>
            </a>
          </li>
          <li id="portfolio">
            <a href="./map.html">
              <i class="nc-icon nc-paper"></i>
              <p>Portfolio</p>
            </a>
          </li>
          <li id="services">
            <a href="./notifications.html">
              <i class="nc-icon nc-laptop"></i>
              <p>Services</p>
            </a>
          </li>
          <li id="visitors">
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>Visitors</p>
            </a>
          </li>
          <li id="messages">
            <a href="./typography.html">
              <i class="nc-icon nc-chat-33"></i>
              <p>Messages</p>
            </a>
          </li>
          <li id="my-profile">
            <a href="./tables.html">
              <i class="nc-icon nc-badge"></i>
              <p>My Profile</p>
            </a>
          </li>
          <li id="logout" class="active-pro">
            <a href="{{route('logout')}}">
              <i class="nc-icon nc-spaceship"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
