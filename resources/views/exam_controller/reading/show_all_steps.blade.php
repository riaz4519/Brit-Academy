@extends('layout.exam_controller')


@section('container')

    <div class="container">

        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Reading Test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Listening Test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Writing Test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu3">Speaking Test</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <h3>Reading Test</h3>

                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach( $steps['reading'] as $reading)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                                <!-- Course Content -->
                                <div class="course-content">
                                    <a href="{{route('addedExamsHome',$reading->id)}}"><h4>{{ $reading->title }}</h4></a>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">@if($reading->status == false)
                                                        {{'In-Active'}}
                                                        @else
                                                {{'Active'}}
                                            @endif
                                        </a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                                        <a href="#">{{ $reading->course->name }}</a>

                                    </div>
                                    <p>{{ $reading->description }}</p>
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
                                        <a href="#" class="edit">Edit</a>
                                    </div>

                                    <div class="course-fee h-100">
                                        <a href="{{ route('reading.add-section',$reading->id) }}" class="free">ADD Sec</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <h3>Listening Test</h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach( $steps['listening'] as $listening)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <audio controls class="" style="width: 100%">
                                    <source src="{{ url($listening->audio) }}" type="audio/ogg">

                                </audio>
                            {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                            <!-- Course Content -->
                                <div class="course-content">
                                    <a href="{{route('addedExamsHome',$listening->id)}}"><h4>{{ $listening->title }}</h4></a>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">@if($listening->status == false)
                                                {{'In-Active'}}
                                            @else
                                                {{'Active'}}
                                            @endif
                                        </a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                                       {{-- <a href="#">{{ $reading->course->name }}</a>--}}

                                    </div>
                                    <p>{{ $listening->description }}</p>
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
                                        <a href="#" class="edit">Edit</a>
                                    </div>

                                    <div class="course-fee h-100">
                                        <a href="{{ route('listening.section.index',$listening->id) }}" class="free">ADD SEC</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <div id="menu2" class="container tab-pane fade"><br>
                <h3 class="text-center">Writing Test</h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($steps['writing'] as $writing)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                            {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                            <!-- Course Content -->
                                <div class="course-content">
                                    <a href="{{route('addedExamsHome',$writing->id)}}"><h4>{{ $writing->title }}</h4></a>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">@if($writing->status == false)
                                                {{'In-Active'}}
                                            @else
                                                {{'Active'}}
                                            @endif
                                        </a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>

                                        <a href="#">{{ $writing->course->name }}</a>

                                    </div>
                                    <p>{{ $writing->description }}</p>
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
                                        <a href="#" class="edit">Edit</a>
                                    </div>

                                    <div class="course-fee h-100">
                                        <a href="{{ route('writing.section.index',$writing->id) }}" class="free">ADD Sec</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div id="menu3" class="container tab-pane fade"><br>
                <h3>Speaking Test</h3>
                {{--<div class="row">--}}
                {{--<!-- Single Popular Course -->--}}

                {{--@foreach($list['general'] as $single_test)--}}



                {{--<div class="col-12 col-md-6 col-lg-4">--}}
                {{--<div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">--}}
                {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                {{--<!-- Course Content -->--}}
                {{--<div class="course-content">--}}
                {{--<h4>{{ $single_test->title }}</h4>--}}
                {{--<div class="meta d-flex align-items-center">--}}
                {{--<a href="#">Sarah Parker</a>--}}
                {{--<span><i class="fa fa-circle" aria-hidden="true"></i></span>--}}
                {{--<a href="#">Art &amp; Design</a>--}}
                {{--</div>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>--}}
                {{--</div>--}}
                {{--<!-- Seat Rating Fee -->--}}
                {{--<div class="seat-rating-fee d-flex justify-content-between">--}}
                {{--<div class="seat-rating h-100 d-flex align-items-center">--}}
                {{--<div class="seat">--}}
                {{--<i class="fa fa-user" aria-hidden="true"></i> 10--}}
                {{--</div>--}}
                {{--<div class="rating">--}}
                {{--<i class="fa fa-star" aria-hidden="true"></i> 4.5--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="course-fee h-100">--}}
                {{--<a href="#" class="free">Free</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}


                {{--</div>--}}
            </div>
        </div>

    </div>

    @endsection