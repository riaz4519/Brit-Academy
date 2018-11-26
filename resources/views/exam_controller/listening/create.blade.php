@extends('layout.exam_controller')

@section('title','Create Listening Test')

@section('container')

    <div class="container">

       <div class="row">

           <div class="col-8 offset-2 border mt-2 p-5" style="background: #EBEBEB">


               <form class="form-horizontal p-5 " action="{{ route('listening.store') }}" method="post" style="background: white; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);" enctype="multipart/form-data">

                   {{ csrf_field() }}
                   <div class="row justify-content-center">

                       <h4 class="">Create Listening Exam</h4>

                   </div>

                   <div class="row">
                       <div class="form-group col-12">
                           <label for="title">Exam Title</label>
                           <input type="text"  class="form-control border-top-0 border-left-0 border-right-0 " name="title" id="title" placeholder="Enter title" required>

                       </div>
                   </div>

                   <div class="row">
                       <div class="form-group col-12 ">
                           <label for="description">DesCription</label>
                           <textarea type="text" class="form-control border-top-0 border-left-0 border-right-0"  name="description" id="description" aria-describedby="Description" placeholder="Enter Details" required></textarea>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-6">

                           <label for="time">Time Duration</label>
                           <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="duration" id="time"  placeholder="Enter time duration" required>

                       </div>
                       <div class="col-6">

                           <label for="audio">Audio file</label>
                           <input type="file" class="form-control border-top-0 border-left-0 border-right-0" id="audio" name="audio" placeholder="Enter time duration" accept="audio/*"  required>

                       </div>

                   </div>
                   <div class="row mt-4">
                       <div class="col-12">
                           <div class="form-group">

                               <input type="submit" value="submit" name="submit" class="form-control btn btn-success">

                           </div>

                       </div>

                   </div>









               </form>

           </div>

       </div>

    </div>


    @endsection