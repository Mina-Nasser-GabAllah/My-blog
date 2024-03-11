@extends('layouts.Admin_app')
@section('title')
   Delete Image
    @endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-red">
            <div class="panel-heading">
                Delete
            </div>

             <div class="panel-body">
                 <label>are you sure to delete this image</label><br>
               <img alt="" src="{{url('/images/'.$photo->path)}}" style="width: 200px;height: 100px;">
             </div>

            <div class="panel-footer">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
            </div>
        </div>
    </form>

    @endsection


