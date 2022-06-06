@extends('layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ url('update',$student->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

         <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Roll Number:</strong>
                    <input type="number" name="roll_number" value="{{ $student->roll_number }}" class="form-control" placeholder="roll_number">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Subject:</strong>
                    <input type="text" name="subject" value="{{ $student->subject }}" class="form-control" placeholder="subject">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Class:</strong>
                    <select class="form-control" name="class">
                         @for($i=1;$i<=12;$i++)
                        <option value="{{ $i }}" @if($i==$student->class) selected @endif>{{ $i }}</option>
                         @endfor
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Score:</strong>
                    <input type="number" name="score" value="{{ $student->score }}" class="form-control" placeholder="score">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $student->images }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection