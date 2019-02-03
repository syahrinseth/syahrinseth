<footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="{{route('/')}}#services">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{route('index.portfolio')}}">
                            Portfolio
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                           Blog
                        </a>
                    </li> -->
                    <li>
                    @if(Auth::user())

                        <a href="{{route('dashboard')}}">
                           Dashboard
                        </a>

                    @else
                        <a href="{{route('login')}}">
                           Login
                        </a>
                    @endif
                    </li>
                    <!-- <li>
                        <a href="#">
                            Licenses
                        </a>
                    </li> -->
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Syahrin Seth v1.0.1
            </div>
        </div>
    </footer>
