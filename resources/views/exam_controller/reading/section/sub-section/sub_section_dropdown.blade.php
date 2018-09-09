@extends('layout.exam_controller')


@section('container')

    <div class="container mt-3">
        <div class="row" >
            <div class="col-3"></div>

            <div class="col-6" >

                <div class="card ">
                    <div class="card-header alert alert-info text-center">
                             <strong>Add Drop Down Option sub-section {{ $rsub->id }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" id="take" class="form-control input-sm ">
                            </div>


                            <p class="btn btn-secondary" id="enter">Enter</p>
                        </div>

                        <form class="form-horizontal" action="{{ route('reading.sub-section.dropdown.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}" method="post">
                            {{csrf_field()}}
                            <div id="drop-wrapper">


                            </div>
                            <div class="row mt-3 " >

                                <div class="col-3"></div>

                                <a href="#" id="add" class="btn btn-secondary col-3 btn-sm">Add Field</a>
                                <input type="submit" class="col-3 btn btn-success" value="submit">



                            </div>






                        </form>


                    </div>



                </div>

            </div>

        </div>

    </div>

    @endsection

@section('script')


    <script>

        $(document).ready(function () {

            $('#enter').click(function () {

                var counter = $('#take').val();
                var input = '<div class="row mt-2"><div class="col"><input type="text" class="form-control input-sm" name="option[]" placeholder="option" required></div><div class="col"><input type="text" class="form-control input-sm" name="value[]" placeholder="value" required></div></div>';

                    $('#drop-wrapper').html("");
                for (i=0;i<counter;i++){


                    $('#drop-wrapper').append(input);

                }



            });



        })









    </script>



    @endsection