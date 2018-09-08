@extends('layout.exam_controller')

@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">

@endsection


@section('container')

    <div class="container ">

        <div class="row">
            <div class="col-1">

            </div>

            <div class="col-10 justify-content-center">






                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('reading.sub-section.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6)])}}" class="mt-5  form-horizontal">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Type:</label>

                        <select class="form-control" name="type">
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                                @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="start">start</label>

                        <input type="text" id="start" class="form-control" name="start">

                    </div>

                    <div class="form-group">
                        <label for="end">end</label>

                        <input type="text" id="end" class="form-control" name="end">

                    </div>


                    <textarea id="summernote" name="passage" class="summernote-ui"></textarea>
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