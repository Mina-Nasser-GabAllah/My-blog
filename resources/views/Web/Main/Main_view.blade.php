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
    .panel{
        border: #0c5460 1px solid;
        padding: 30px;
        margin:30px;
        border-radius:20px;
        width: 100%;
        background:#ffffff;

    }
    .panel:hover{
        background: #1b6d85;
        color: #000000;
    }
</style>
@endsection

@section('content')
<div class="row" >
    @foreach($sections as $section)
    <div class="col-md-3" >
        <a href="{{route('Web.Section.Main',['id'=>$section->id])}}">
            <div class="panel">
                <label>{{$section->name}}</label>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
