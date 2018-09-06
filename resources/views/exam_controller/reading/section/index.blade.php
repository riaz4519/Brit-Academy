@extends('layout.exam_controller')

@section('container')

    <div class="container">

        <div class="row mt-5" style="text-align: center">


            <div class="col">
                <div class="single-test-adding col align-self-center" >
                    <div class="number" >

                            <h3 class="badge-info">SECTION ONE</h3>
                    </div>
                    <br>


                    @if(!empty($sections->get(0)))
                        <a href="{{ route('reading.update.section',['reading_id'=>$sections->get(0)->pivot->reading_id,'section_id'=>$sections->get(0)->pivot->rsection_id]) }}" class="btn btn-secondary ">UPDATE SECTION</a>
                        <a href="{{ route('reading.show.section',['reading_id'=>$sections->get(0)->pivot->reading_id,'section_id'=>$sections->get(0)->pivot->rsection_id]) }}" class="btn btn-info">SHOW SECTION</a>

                    @else

                        <a href="" class="btn btn-light  ">Add SECTION </a>
                    @endif


                </div>
            </div>
            <div class="col">
                <div class="single-test-adding col align-self-center" >
                    <div class="number" >

                        <h3 class="badge-info">SECTION TWO</h3>
                    </div>
                    <br>

                    @if(!empty($sections->get(1)))
                        <a href="{{ route('reading.update.section',['reading_id'=>$sections->get(1)->pivot->reading_id,'section_id'=>$sections->get(1)->pivot->rsection_id]) }}" class="btn btn-secondary ">UPDATE SECTION</a>
                        <a href="{{ route('reading.show.section',['reading_id'=>$sections->get(1)->pivot->reading_id,'section_id'=>$sections->get(1)->pivot->rsection_id]) }}" class="btn btn-info">SHOW SECTION</a>

                    @else

                        <a href="{{ route('reading.section-form',Request::segment(4)) }}" class="btn btn-light  ">Add SECTION </a>
                    @endif


                </div>
            </div>
            <div class="col">
                <div class="single-test-adding col align-self-center" >
                    <div class="number" >

                        <h3 class="badge-info">SECTION THREE</h3>

                    </div>
                    <br>

                    @if(!empty($sections->get(2)))
                        <a href="{{ route('reading.update.section',['reading_id'=>$sections->get(1)->pivot->reading_id,'section_id'=>$sections->get(2)->pivot->rsection_id]) }}" class="btn btn-secondary ">UPDATE SECTION</a>
                        <a href="{{ route('reading.show.section',['reading_id'=>$sections->get(2)->pivot->reading_id,'section_id'=>$sections->get(2)->pivot->rsection_id]) }}" class="btn btn-info">SHOW SECTION</a>

                    @else

                        <a href="{{ route('reading.section-form',Request::segment(4)) }}" class="btn btn-light  ">Add SECTION </a>
                    @endif


                </div>
            </div>


        </div>
        @if (Session::has('msg'))

            <div class="alert alert-danger alert-dismissible text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong>
                {!!Session::get('msg')!!}

            </div>
        @endif

    </div>

    @endsection