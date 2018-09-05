<!-- Preloader -->
<div id="preloader">
    <div class="spinner"></div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">



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
                            <li><a href="#">TEST</a>
                                <ul class="dropdown">


                                    <li><a href="{{ route('createTestPage') }}">Create Test</a></li>
                                    <li><a href="{{ route('test_list') }}">Test List</a></li>

                                    <li><a href="single-course.html">Create Category</a></li>




                                </ul>
                            </li>


                            {{--IElTS Exam  --}}
                            <li><a href="{{ route('examIndex') }}">Exam</a>
                                <ul class="dropdown">


                                    <li><a href="{{ route('examCreatePage') }}">Create Exam</a></li>
                                    <li><a href="{{ route('examList') }}">List of Exams</a></li>




                                </ul>
                            </li>
                            {{-- end IElTS Exam  --}}
                            {{--IElTS Exam  --}}
                            <li><a href="#">Exam Steps</a>
                                <ul class="dropdown">

                                    <li><a href="single-course.html">Create Listening test</a></li>
                                    <li><a href="{{ route('createReadingIndex') }}">Create Reading test</a></li>
                                    <li><a href="single-course.html">Create Writing test</a></li>
                                    <li><a href="single-course.html">Create Create test</a></li>
                                    <li><a href="{{ route('showAllSteps') }}">Show All Steps</a></li>



                                </ul>
                            </li>
                            {{-- end IElTS Exam  --}}



                            {{--IElTS Exam tips --}}
                            <li><a href="#">Exam Tips</a>
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





                     {{--after login --}}
                        @if(Auth::check())
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
                        @endif
                        {{--end of after login--}}




                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->