@extends('layouts.Admin_app')
@section('title')
   Delete User
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
                    <div class="form-group">
                        <label>Are you sure to delete ?</label>
                        <span style="color: #761c19">{{$user->name}}</span>
                    </div>
                </div>


                <div class="panel-footer">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
            </div>
        </div>
    </form>

    @endsection


