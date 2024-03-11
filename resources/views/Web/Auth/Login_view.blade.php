@extends('layouts.Web_app')
@section('title')
    Login Page
@endsection

@section('subject')
    login
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
            <form method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="control-group">
                    <div class="form-group ">
                        <label>Email Address : </label>
                        <input type="email" class="form-control myText" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group ">
                        <label>Password : </label>
                        <input type="password" class="form-control myText" placeholder="Password" name="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
