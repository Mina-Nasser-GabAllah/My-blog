@extends('layouts.Admin_app')
@section('title')
    Display Images
@endsection
@section('content')
    <div class="col-md-6">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('Image.Add')}}">Add Image</a>
        <div class="panel panel-primary">

            <div class="panel-heading">
               Images
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
            @foreach($photos as $photo)
                    <img alt="" src="{{url('/images/'.$photo->path)}}" style="width: 100px;height: 100px;border: solid 2px #1ab7ea;border-radius: 10px" >
                    <a  class="btn btn-danger" href="{{route('Image.Delete',['id'=>$photo->id])}}"> Delete</a>
                    <a  class="btn btn-warning" href="{{route('Image.Update',['id'=>$photo->id])}}"> Update</a>

                    <hr>
                @endforeach
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

@endsection
