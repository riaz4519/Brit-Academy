@extends('layout.main')

@section('title','Tests Library')

@section('container')

    <div class="container">

        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if($list['type'] == 'all') {{ 'active' }} @endif" data-toggle="tab" href="#home">All Test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($list['type'] == 'academic') {{ 'active' }} @endif" data-toggle="tab" href="#menu1">Academic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($list['type'] == 'general') {{ 'active' }} @endif" data-toggle="tab" href="#menu2">General Training </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane  @if($list['type'] == 'all') {{ 'active' }} @endif"><br>
                <h3>All test</h3>

                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($list['all'] as $single_test)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <a href="{{route('addedExamsHome',$single_test->id)}}"><h4>{{ $single_test->title }}</h4></a>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">Sarah Parker</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                                        <a href="#">{{ $single_test->course->name }}</a>

                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                                </div>
                                <!-- Seat Rating Fee -->
                                <div class="seat-rating-fee d-flex justify-content-between">
                                    <div class="seat-rating h-100 d-flex align-items-center">
                                        <div class="seat">
                                            <i class="fa fa-user" aria-hidden="true"></i> 10
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                        </div>
                                    </div>

                                    <div class="course-fee h-100">
                                        <a href="{{ route('test-library.test_room',$single_test->id) }}" class="free">Start </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <div id="menu1" class="container tab-pane  @if($list['type'] == 'academic') {{ 'active' }} @endif"><br>
                <h3>Academic </h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($list['academic'] as $single_test)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>{{ $single_test->title }}</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">Sarah Parker</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">Art &amp; Design</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                                </div>
                                <!-- Seat Rating Fee -->
                                <div class="seat-rating-fee d-flex justify-content-between">
                                    <div class="seat-rating h-100 d-flex align-items-center">
                                        <div class="seat">
                                            <i class="fa fa-user" aria-hidden="true"></i> 10
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                        </div>
                                    </div>
                                    <div class="course-fee h-100">
                                        <a href="{{ route('test-library.test_room',$single_test->id) }}" class="free">Start </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div id="menu2" class="container tab-pane  @if($list['type'] == 'general') {{ 'active' }} @endif"><br>
                <h3>General Training </h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($list['general'] as $single_test)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>{{ $single_test->title }}</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">Sarah Parker</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">Art &amp; Design</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                                </div>
                                <!-- Seat Rating Fee -->
                                <div class="seat-rating-fee d-flex justify-content-between">
                                    <div class="seat-rating h-100 d-flex align-items-center">
                                        <div class="seat">
                                            <i class="fa fa-user" aria-hidden="true"></i> 10
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                        </div>
                                    </div>
                                    <div class="course-fee h-100">
                                        <a href="#" class="free">Free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>

    @endsection