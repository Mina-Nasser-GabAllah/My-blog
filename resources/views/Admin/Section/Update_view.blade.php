@extends('layouts.Admin_app')
@section('title')
   Update section
    @endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
            <div class="panel-heading">
                section info
            </div>
             <div class="panel-body">
                 <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="section name" value="{{$section->name}}">
                 </div>
                 <div class="form-group">
                     <label>Editor for this section:</label>
                     <select name="admin">
                         <option value="">Empty</option>
                         @foreach($users as $user)
                             <option value="{{$user->id}}">{{$user->name}}</option>
                         @endforeach
                         @if(!is_null($section->Admin))
                         <option  selected="selected" value="{{$section->Admin->id}}">{{$section->Admin->name}}</option>
                         @endif
                     </select>
                 </div>
             </div>

            <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
            </div>
        </div>
    </form>

    @endsection


