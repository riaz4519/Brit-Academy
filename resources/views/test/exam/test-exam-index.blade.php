@extends('layout.main')




@section('container')

    <div class="container">


        <div class="container">

            <div class="row">
                <!-- Single Popular Course -->




                @foreach($readings as $reading)



                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                        <!-- Course Content -->
                            <div class="course-content">
                                <h4>{{ $reading->title }}</h4>
                                <div class="meta d-flex align-items-center">
                                    <a href="#">Sarah Parker</a>
                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    <a href="#">{{ $reading->course->name }}</a>
                                </div>
                                <p>{{ $reading->description }}</p>
                            </div>
                            <!-- Seat Rating Fee -->


                            <div class="seat-rating-fee d-flex justify-content-between">
                                <div class="seat-rating h-100 d-flex align-items-center">
                                    <div class="seat">
                                        <i class="fa fa-user" aria-hidden="true"></i>{{ app('request')->input('id') }}
                                    </div>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                    </div>
                                    <div class="seat">
                                        <i class="fa fa-upload" aria-hidden="true"></i> {{ $reading->created_at->format('M d Y') }}
                                    </div>
                                </div>

                                <div class="course-fee h-100">
                                    <a href="{{route('test.give.index',$reading->id)}}"  class="free">Give Test</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>

        </div>


    </div>



@endsection