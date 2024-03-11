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
     .comment{
         border: solid #1b6d85 1px;
         border-radius: 20px;
         padding: 20px;
         margin: 10px;
         align-items: center;
         word-break: break-word;
     }
     .comment .user-name {
         width: 75px;
         height: 75px;
         background-color: #1b6d85;
         color: white;
         border-radius: 50%;
         display: flex;
         justify-content: center;
         align-items: center;
     }
     .control{
         font-size: 12px;
     }
     .footer{
         font-size: 12px;
         color: #1a202c;
         margin-left: auto;
     }
     .delete_btn:hover{
         text-decoration-line: underline !important;
         color: #0d6aad !important;
         cursor: pointer;
     }

 </style>

@endsection
@section('content')
    <article>
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    {!!$post->content!!}
                    <div class="row" style="margin-top: 20px">
                    @foreach($post->Photos as $photo)
                            <div class="col-md-4" style="margin-right: 70px">
                                <img src="{{url('/images/'.$photo->path)}}" style="width:300px;height: 250px ;border-radius: 10px ;">
                            </div>
                    @endforeach

                    </div>
                </div>
             </div>
        </div>
    </article>
    @auth
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form  method="post" action="">
                    {{csrf_field()}}
                    <div class="control-group" >
                        <div class="form-group floating-label-form-group controls">
                            <label>Comments</label>
                            <textarea rows="5" class="form-control myTextarea" placeholder="Comment" name="content" required data-validation-required-message="Please enter a comment."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" style="border-radius: 5px;" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($comments as $comment)
                <div class="row comment">
                    <div class="col-md-2">
                        <div class="user-name">
                            <label>{{$comment->User->name}}</label>
                        </div>
                    </div>
                   <div class="col-md-8">
                        {!!str_replace(array("\n"),'<br>',$comment->content)!!}
                   </div>
                    @if($comment->User->id==Auth::user()->id or Auth::user()->role=='admin'or Auth::user()->id==$post->section->admin)
                        <div class="col-md-2">
                            <div class="control">
                                <a href="{{route('Web.Comment.Edit',['id'=>$comment->id])}}">Edit</a> |
                                <a class="delete_btn" onclick="deleteComment('{{route('Web.Comment.Delete',['id'=>$comment->id])}}')">Delete</a>

                            </div>
                        </div>
                    @endif
                    <div class="footer">
                        {{$comment->created_at}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
        <script>
            function deleteComment($url){
                var flag=confirm("Are you sure to delete ?")
                if(flag){
                    window.location.href=$url;
                }
            }
        </script>
    @endauth
@endsection
