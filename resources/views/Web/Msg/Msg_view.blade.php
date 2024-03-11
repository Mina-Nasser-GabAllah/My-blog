@extends('layouts.Web_app')
@section('title')
   Contact Us
@endsection

@section('subject')
    Contact Us
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
        .myTextarea{
            border-radius: 20px !important;
            padding:12px !important;
            border: 1px solid silver !important;

        }

    </style>
@endsection

@section('content')
    <div class="row" >
        <div class="col-md-12">
            <form method="POST" action="">
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
                <div class="control-group" >
                    <div class="form-group floating-label-form-group controls">
                        <label>Massage</label>
                        <textarea rows="5" class="form-control myTextarea" placeholder="content" name="content"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Group Or User:</label>
                    <select name="to">
                        <option value="admin">Admin Group</option>
                        <option value="editor">Editor Group</option>
                        <option value="all">Admin & Editor Group</option>
                    @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
