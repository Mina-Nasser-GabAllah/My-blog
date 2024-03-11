@extends('layouts.Admin_app')
@section('title')
   Delete section
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
                 <label>are you sure</label>
                 <span style="color: #9f191f">{{$section->name}}</span>
             </div>

            <div class="panel-footer">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
            </div>
        </div>
    </form>

    @endsection


