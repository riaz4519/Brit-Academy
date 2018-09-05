@extends('layout.exam_controller')


@section('container')

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-1 d-flex justify-content-center align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            @if (Session::has('msg'))

                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong>
                                    {!!Session::get('msg')!!}

                                </div>
                            @endif
                            <h4>Create Reading Test</h4>
                            <form action="{{ route('createReading') }}" method="POST">
                                {{ csrf_field() }}

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title"  id="text" value="{{old('title')}}" placeholder="Enter  Title" required>

                                        </div>
                                    </div>

                                    {{--description--}}
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="10" cols="5"  name="description"  id="description" placeholder="Enter  Details" required>{{ old('description') }}</textarea>

                                        </div>
                                    </div>
                                    {{--end of description--}}
                                    {{--course type--}}

                                    @foreach($courses as $course)
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label>{{ $course->name }}</label>
                                                <input type="radio" class="form-control" name="course" value="{{ $course->id }}" id="checkbox" placeholder="Academic Test">
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