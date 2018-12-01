{{--<!-- Preloader -->
<div id="preloader">
    <div class="spinner"></div>
</div>--}}

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area d-flex justify-content-between align-items-center">
        <!-- Contact Info -->
        <div class="contact-info">
            <a href="#"><span>Phone:</span> +44 300 303 0266</a>
            <a href="#"><span>Email:</span> info@clever.com</a>
        </div>
        <!-- Follow Us -->
        <div class="follow-us">
            <span>Follow us</span>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="clever-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="cleverNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ route('welcome') }}">Brit Academy</a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#">My IELTS</a>
                                <ul class="dropdown">


                                    <li><a href="single-course.html">IELTS Analytics</a></li>
                                    <li><a href="single-course.html">History</a></li>
                                    <li><a href="single-course.html">User Profile</a></li>


                                </ul>
                            </li>


                            {{--practice exam for ielts based on categories--}}
                            <li><a href="{{ route('test-library.index','all') }}">Practice Exam</a>
                                <ul class="dropdown">


                                    <li><a href="{{ route('test-library.index','academic') }}">Academic Tests</a></li>
                                    <li><a href="{{ route('test-library.index','general') }}">General Tests</a></li>
                                    <li><a href="">Exam For Test</a></li>


                                </ul>
                            </li>

                            {{--IElTS Exam tips --}}
                            <li><a href="#">IELTS Exam Tips</a>
                                <ul class="dropdown">


                                    <li><a href="single-course.html">Listening Tips</a></li>
                                    <li><a href="single-course.html">Reading Tips</a></li>
                                    <li><a href="single-course.html">Writing Tips</a></li>
                                    <li><a href="single-course.html">Speaking Tips</a></li>
                                    <li><a href="single-course.html">Essay Examples</a></li>



                                </ul>
                            </li>
                            {{-- end IElTS Exam tips --}}

                            <li><a href="#">About</a>
                                <ul class="dropdown">


                                    <li><a href="single-course.html">IELTS Introduction</a></li>
                                    <li><a href="single-course.html">About Us</a></li>
                                    <li><a href="single-course.html">Contact Us</a></li>




                                </ul>
                            </li>
                            {{--itelts introduction--}}



                        </ul>

                        <!-- Search Button -->
                        <div class="search-area">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>


                    @guest

                        <!-- Register / Login -->
                        <div class="register-login-area ">
                            @if(Route::current()->getName() == 'register')

                                @else
                            <a href="{{route('register')}}" class="btn active">Register</a>
                            @endif
                            @if(Route::current()->getName() == 'login')



                                @else
                            <a href="{{route('login')}}" class="btn active">Login</a>
                                @endif
                        </div>
                        @else
                            <!-- Register / Login -->
                                <!-- Register / Login -->
                        <div class="login-state d-flex align-items-center">
                            <div class="userthumb">
                                <img src="img/bg-img/t1.png" alt="">
                            </div>
                            <div class="user-name mr-30">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                        <a class="dropdown-item" href="{{route('home')}}">Profile</a>
                                        <a class="dropdown-item" href="#">Account Info</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                    @endguest

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->