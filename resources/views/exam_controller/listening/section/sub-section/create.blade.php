@extends('layout.exam_controller')

@section('title','Create SubSection')

@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">

@endsection

@section('container')

    <div class="container">


        <div class="row justify-content-center" >

            <div class="col-8">



                <form method="post" action="{{route('listening.section.sub.store',[Request::segment(3),Request::segment(5)])}}" class="mt-5  form-horizontal">

                    {{ csrf_field() }}

                    {{--for select what type of section--}}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Section Type</div>
                            </div>
                            <select type="text"  name="ltype_id" class="form-control"  required>


                                <option class="disabled"></option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" title="{{ $type->description }}">{{ $type->name }}</option>

                                    @endforeach

                            </select>
                        </div>

                    </div>
                    {{--end type--}}

                    {{--time selection--}}
                    <div class="row mb-2">

                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Time Start</div>
                                </div>
                                <input type="text"  name="time_start" class="form-control"  placeholder="Enter section starting time" required>


                            </div>
                        </div>
                        <div class="col">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Time End</div>
                                </div>
                                <input type="text"  name="time_end" class="form-control"  placeholder="Enter section end time" required>
                            </div>
                        </div>

                    </div>
                    {{--end time selection--}}


                    {{--question number start and end --}}
                    <div class="row mb-2">

                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Question start</div>
                                </div>
                                <input type="number"  name="start" class="form-control"  required>


                            </div>
                        </div>
                        <div class="col">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Question End</div>
                                </div>
                                <input type="number"  name="end" class="form-control"  required>
                            </div>
                        </div>

                    </div>
                    {{--question number start and end--}}

                    <textarea id="summernote" name="body" class="summernote-ui " required></textarea>

                    <button type="submit"  class="btn btn-success mt-2">Submit</button>
                </form>



            </div>

        </div>

    </div>

    @endsection

@section('script')

    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Insert Passeage for section',
                tabsize: 2,
                height: 200,

            });
        });


    </script>

@endsection