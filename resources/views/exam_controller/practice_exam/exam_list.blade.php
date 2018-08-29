@extends('layout.exam_controller')


@section('container')


    <div class="container">

        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">All Exam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Academic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">General Training </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <h3 class="text-center">All Exams</h3>

                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($exams['all'] as $single_exam)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>{{ $single_exam->name }}</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">Sarah Parker</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">{{ $single_exam->course->name }}</a>
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
                                        <a href="#" class="edit">Edit</a>
                                    </div>
                                    <div class="course-fee h-100">
                                        <a href="#" class="free">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <h3 class="text-center">Academic Exams</h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($exams['academic'] as $single_exam)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>{{ $single_exam->name }}</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">Sarah Parker</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">{{ $single_exam->course->name }}</a>
                                    </div>
                                    <p>{{$single_exam->description}}</p>
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
            <div id="menu2" class="container tab-pane fade"><br>
                <h3 class="text-center">General Training Exams</h3>
                <div class="row">
                    <!-- Single Popular Course -->

                    @foreach($exams['general'] as $single_exam)



                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="{{asset('img/bg-img/c1.jpg') }}" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>{{ $single_exam->name }}</h4>
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