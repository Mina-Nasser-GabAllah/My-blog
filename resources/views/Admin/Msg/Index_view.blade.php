@extends('layouts.Admin_app')
@section('title')
    Display Msg
@endsection
@section('content')
    <div class="col-lg-12">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('Msg.Index',['type'=>'All'])}}">All</a>
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('Msg.Index',['type'=>'Read'])}}">Read</a>
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('Msg.Index',['type'=>'UnRead'])}}">UnRead</a>


        <div class="panel panel-primary">
            <div class="panel-heading">
                Msg
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Read at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($msgs as $msg)
                    <tr class="odd gradeX">
                        <td><i class="fa fa-envelope{{is_null($msg->read_at)?'':'-o'}}"></i></td>
                        <td>{{$msg->data['name']}}</td>
                        <td>{{$msg->data['email']}}</td>
                        <td>{{$msg->data['phone']}}</td>
                        <td>{{$msg->read_at}}</td>
                        <td>
                            <form action="{{route('Msg.Delete',['id'=>$msg->id])}}" method="post" id="deleteForm-{{$msg->id}}">
                                @csrf
                            </form>
                            <a class="btn btn-danger" href="{{route('Msg.Delete',['id'=>$msg->id])}}" onclick="deleteNoti('{{$msg->id}}')">Delete</a>
                            <a class="btn btn-primary" href="{{route('Msg.Read',['id'=>$msg->id])}}">Read</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>
                    function deleteNoti($id){
                        var $flag=confirm("Are you sure ?");
                        if($flag){
                            document.getElementById('deleteForm-'+$id).submit;
                        }
                    }
                </script>
                <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                </script>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

@endsection
