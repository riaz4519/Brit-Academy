@extends('layout.exam_controller')


@section('container')

    <div class="container mt-5">


        <div class="row" >

            <div class="col-2">



            </div>
            <div class="col-8" style="background-color:#D6E4DA ">

                       <div class="data">
                         {!! $rsection->passage !!}

                       </div>


            </div>


            <div class="col-2">

            </div>

        </div>


    </div>


    @endsection