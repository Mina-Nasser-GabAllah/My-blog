@extends('layouts.Web_app')
@section('title')
    Main Page
@endsection

@section('subject')
    Welcome
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
            <form method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="control-group">
                    <div class="form-group ">
                        <label>Name : </label>
                        <input type="text" class="form-control myText" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Email Address : </label>
                        <input type="email" class="form-control myText" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">

                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Phone : </label>
                        <input type="text" class="form-control myText" placeholder="Phone" name="phone">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Password : </label>
                        <input type="password" class="form-control myText" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Re-Password : </label>
                        <input type="password" class="form-control myText" placeholder="Password" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
