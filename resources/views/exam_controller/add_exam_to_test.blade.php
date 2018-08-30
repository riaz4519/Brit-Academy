@extends('layout.exam_controller')

@section('container')

    <div class="container">

        <div class="alert alert-primary text-center" role="alert">
            <h4>{{$exams['course_name']}}</h4>
        </div>
        @if (Session::has('msg'))

            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong>
                {!!Session::get('msg')!!}

            </div>
        @endif

        <div class="row">
            <!-- Single Popular Course -->




            @foreach($exams['exams'] as $single_exam)

                @if(!$single_exam->tests->contains($single_exam->id))

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        {{--<img src="{{asset('img/bg-img/c1.jpg') }}" alt="">--}}
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>{{ $single_exam->name }}</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Sarah Parker</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{ $single_exam->course->name }}</a>
                            </div>
                            <p>{{ $single_exam->description }}</p>
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
                                    <i class="fa fa-upload" aria-hidden="true"></i> {{ $single_exam->created_at->format('M d Y') }}
                                </div>
                            </div>

                            <div class="course-fee h-100">
                                <a href="{{route('addingExamToTestSend',['id'=>Request::segment(2),'emam_id'=>$single_exam->id])}}"  class="free">ADD</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach


        </div>

    </div>

    @endsection

