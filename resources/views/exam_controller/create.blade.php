@extends('.layout.exam_controller')


@section('container')

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-1 d-flex justify-content-center align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4>Create Test</h4>
                            <form action="{{ route('createTest') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title"  id="text" placeholder="Enter Test Title" required>

                                        </div>
                                    </div>
                                    {{--course type--}}

                                    @foreach($courses as $course)
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>{{ $course->name }}</label>
                                            <input type="checkbox" class="form-control" name="test_type[]" value="{{ $course->id }}" id="checkbox" placeholder="Academic Test">
                                        </div>
                                    </div>
                                    @endforeach
                                    {{--end of course type--}}

                                    {{--<div class="col-12 col-lg-6">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<input type="text" class="form-control" id="site" placeholder="Site">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- ##### Register Now End ##### -->

    @endsection