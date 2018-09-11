@extends('layout.exam_controller')


@section('container')



    <div class="container">

        <div class="row">

            <div class="col-2">
                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>
                @endif

            </div>




            <div class="col-8">

                <div class="card ">
                    <div class="card-header alert alert-info text-center">

                        <strong>Add question ( {{ $rsub->start }}-{{ $rsub->end }} ) Now add Question {{ ($rsub->start+$rsub->rquestions->count())  }} of {{ $rsub->type->name }}</strong>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('reading.sub-section.question.passageGap.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}">

                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Question:</strong></label>
                                <div class="col-sm-9">
                                    <textarea type="text"  class="form-control" id="staticEmail" name="question" required placeholder="add <span class='passage-gap'>{{($rsub->start+$rsub->rquestions->count()) }}</span> for question"></textarea>
                                </div>
                            </div>


                            {{--radio--}}



                            {{--answer--}}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Answer:</strong></label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="staticEmail" name="answer" required>
                                </div>
                            </div>



                            {{--radio end--}}







                            <input type="hidden" name="number" value="{{ $rsub->start+$rsub->rquestions->count()  }}">

                            <input type="submit" class="form-control btn-sm offset-4 col-5">


                        </form>



                    </div>




                </div>

            </div>

        </div>




    </div>



@endsection




