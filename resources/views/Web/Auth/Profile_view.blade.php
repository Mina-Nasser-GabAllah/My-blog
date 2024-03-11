@extends('layouts.Web_app')
@section('title')
    Profile
@endsection

@section('subject')
    Profile
@endsection

@section('headerImage')
    {{url('/images/home-bg.jpg')}}
@endsection
@section('head')
    <style>
        .myText{
            border-radius: 10px !important;
            padding:12px !important;
            border: 1px solid silver !important;

        }
        .myText:hover{
             border-radius: 10px !important;
             padding:12px !important;
             border: 1px solid #0d6aad !important;

         }

    </style>
@endsection

@section('content')
    <div class="row" >
        <div class="col-md-12">
            <form method="post" action="">
                {{csrf_field()}}
                <div class="control-group">
                    <div class="form-group ">
                        <label>Name : </label>
                        <input type="text" class="form-control myText" placeholder="Name" value="{{$user->name}}" name="name">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Phone : </label>
                        <input type="text" class="form-control myText" placeholder="Phone" value="{{$user->phone}}"  name="phone">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>C-Password : </label>
                        <input type="password" class="form-control myText" placeholder="C-Password" name="c_password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>New Password : </label>
                        <input type="password" class="form-control myText" placeholder="NewPassword" name="password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Re-Password : </label>
                        <input type="password" class="form-control myText" placeholder="Password" name="confirm_password">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
