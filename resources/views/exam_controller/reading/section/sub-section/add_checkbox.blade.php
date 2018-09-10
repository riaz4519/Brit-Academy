@extends('layout.exam_controller')


@section('container')



    <div class="container">

        <div class="row">

            <div class="col-2">


            </div>


            <div class="col-8">

                <div class="card ">
                    <div class="card-header alert alert-info text-center">

                        <strong>Add question ( {{ $rsub->start }}-{{ $rsub->end }} ) Now add Question {{ $rsub->rquestions->count() + 1 }}</strong>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('reading.sub-section.question.checkbox.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}">

                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Question:</strong></label>
                                <div class="col-sm-10">
                                    <textarea type="text"  class="form-control" id="staticEmail" name="question" required></textarea>
                                </div>
                            </div>


                                {{--checkbox--}}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Answer Select:</strong></label>
                                <div class="col-sm-10">

                                    <strong class="mb-3">Select Option for Answer:</strong>

                                    @foreach($rsub->rdrops as $rdrop)

                                        <div class="form-check">

                                            <label class="form-check-label mr-4 text-center"  for="defaultCheck1">
                                                <strong>{{ $rdrop->option }}.</strong>
                                            </label>



                                            <input class="form-check-input" name="answer[]" type="checkbox" value="{{ $rdrop->option }}" >

                                            <label class="form-check-label text-center" for="defaultCheck1">
                                                {{ $rdrop->value }}
                                            </label>
                                        </div>

                                        @endforeach

                                </div>
                            </div>

                            {{--checkbox end--}}







                            <input type="hidden" name="number" value=" {{ $rsub->end}}">

                            <input type="submit" class="form-control btn-sm offset-4 col-5">


                        </form>



                    </div>




                </div>

            </div>

        </div>




    </div>



@endsection