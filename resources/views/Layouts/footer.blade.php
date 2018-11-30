<footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                           Blog
                        </a>
                    </li>
                    <li>
                    @if(Auth::user())
                        @if(Auth::user()->user_type == 'admin')
                        <a href="{{route('dashboard')}}">
                           Dashboard
                        </a>
                        @endif
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
                &copy; 2018, made with <i class="fa fa-heart heart"></i> by Syahrin Seth v1.0.0
            </div>
        </div>
    </footer>
