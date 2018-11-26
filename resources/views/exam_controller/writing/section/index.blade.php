@extends('layout.exam_controller')



@section('container')


    <div class="container">

       <div class="row mt-5">

           <div class="col-12">

            @if($writing->wsections->count() == 0)

{{--
                <a href="{{ route('writing.section.create',$writing->id) }}" class="btn btn-primary text-center">Create writing Task 1</a>
--}}


                   <div class="card text-center border-success">
                       <div class="card-header border-danger">
                           Writing Task Creating information
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">No Task Created Yet.</h5>
                           <p class="card-text">Please start by Creating task One</p>
                           <a href="{{ route('writing.section.create',$writing->id) }}" class="btn btn-outline-success text-center">Create writing Task 1</a>
                       </div>

                   </div>
                @elseif($writing->wsections->count() == 1)

                   <div class="row">
                       



                @foreach($writing->wsections as $wsection)

                       <div class="card   col-11">


                           <div class="card-header border-danger ">
                               <div class="float-left" >

                                   <b>{{ $wsection->title }}</b>

                               </div>
                               <div class="float-right">
                                   <a href="{{ route('writing.section.create',$writing->id) }}" class="btn btn-success">Add Writing Task 2</a>  <a href="{{ route('writing.section.edit',['writing_id'=>$writing->id,'wsection_id'=>$wsection->id]) }}" class="btn btn-info">Edit</a> <button onclick="delete_section('{{ $writing->id }}','{{$wsection->id}}')"  class="btn btn-danger">Delete</button>

                               </div>
                           </div>
                           <div class="card-body">
                               {!! str_replace(['%7B','%7D'],['{','}'],$wsection->body) !!}


                           </div>


                       </div>

                   @endforeach


                    </div>

                @else
               {{--for showing two exams--}}

                   <div class="row">


                       @foreach($writing->wsections as $wsection)

                           <div class="card   col-11">


                               <div class="card-header border-danger ">
                                   <div class="float-left" >

                                       <b>{{ $wsection->title }}</b>

                                   </div>
                                   <div class="float-right">
                                        <a href="{{ route('writing.section.edit',['writing_id'=>$writing->id,'wsection_id'=>$wsection->id]) }}" class="btn btn-info">Edit</a> <button  onclick="delete_one('{{ $writing->id }}','{{$wsection->id}}')" class="btn delete_button btn-danger">Deletedfd</button>

                                   </div>
                               </div>
                               <div class="card-body">
                                   {!! $wsection->body !!}


                               </div>


                           </div>

                       @endforeach


                   </div>


                {{--end showing two exams--}}

           </div>


                @endif




           </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content border-danger">

                    <div class="modal-body text-center">
                        <h5>Are You sure ?</h5>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a type="button" href="" class="btn delete_modal btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        {{--end of modal--}}

       </div>




    @endsection

@section('script')


    <script>

       function delete_one (writing_id,wsection_id) {


           $('.delete_modal').attr('href','{{url('/')}}/admin/writing/'+writing_id+'/section/'+wsection_id+'/delete')
           $('#exampleModalCenter').modal('show');




       }


        $(document).ready(function () {





        });
    </script>


    @endsection