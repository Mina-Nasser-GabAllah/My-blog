@extends('layouts.Admin_app')
@section('title')
    Display Sections
@endsection
@section('content')
    <div class="col-lg-12">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('Section.Add')}}">Add Section</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sections
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                    <tr class="odd gradeX">
                        <td>{{$section->name}}</td>
                        <td>{{is_null($section->Admin)?'':$section->Admin->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('Section.Delete',['id'=>$section->id])}}">Delete</a>
                            <a class="btn btn-warning" href="{{route('Section.Update',['id'=>$section->id])}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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
