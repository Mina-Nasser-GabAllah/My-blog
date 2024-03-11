@extends('layouts.Web_app')
@section('title')
    {{$post->title}}
@endsection

@section('subject')
   {{$post->title}}
@endsection

@section('headerImage')
    {{count($post->Photos)>0 ? url('/images/'.$post->Photos[0]->path): url('/images/home-bg.jpg')}}
@endsection

@section('head')
 <style>
     .myTextarea{
         border-radius: 20px !important;
         padding:12px !important;
         border: 1px solid silver !important;

     }

 </style>

@endsection
@section('content')
    @auth

        <div class="row">
            <div class="col-md-12 ">
                <form  method="post" action="">
                    {{csrf_field()}}
                    <div class="control-group" >
                        <div class="form-group floating-label-form-group controls">
                            <label>Comments</label>
                            <textarea rows="5" class="form-control myTextarea" placeholder="Comment" name="content" required data-validation-required-message="Please enter a comment.">{{$comment->content}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>

    @endauth
@endsection
