@extends('layouts.Admin_app')
@section('title')
   Update User
    @endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
            <div class="panel-heading">
                User info
            </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail : </label>
                        <input type="email" name="email" class="form-control" placeholder="E-Mail" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Phone : </label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label>Password : </label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
            </div>
        </div>
    </form>

    @endsection


