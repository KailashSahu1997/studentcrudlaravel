@extends('layout') 
@section('content')
<div class="row mt-3">
    <div class="col-md-12 mt-3" align="right" style="margin-top: 20px;margin-bottom: 20px"><a class="btn btn-success" href="{{ url('create') }}">New Student</a></div>
    <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </div>
<div class="col-md-12">
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll Number</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Profile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $list)
            <tr>
                <td>{{ $list->name }}</td>
                <td>{{ $list->roll_number }}</td>
                <td>{{ $list->class }}</td>
                <td>{{ $list->subject }}</td>
                <td>{{ $list->score }}</td>
                <td><img src="/image/{{ $list->images }}" width="100px"></td>
                <td> <form action="{{ url('destroy',$list->id) }}" method="POST">
      
                    <a class="btn btn-primary" href="{{ url('edit',$list->id) }}">Edit</a>
     
                    @csrf
<!-- @method('DELETE') -->
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    <script type="text/javascript">
$(document).ready(function() 
{
    $('#example').DataTable();
} );
</script>
    @endsection