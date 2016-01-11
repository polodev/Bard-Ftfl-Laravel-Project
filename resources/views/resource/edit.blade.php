@extends('master_trainer/master')
@section('title', 'edit resource')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
        	 <h3 class="text-center">Update a File</h3>
           
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
				
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
				@foreach ($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>
				@endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    
                    <div class="form-group">
                        <label for="inputCourseName" class="col-sm-4 control-label">Course Name: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="course_id">
                             
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="inputTitle" class="col-sm-4 control-label">Title: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputTitle" name="title"  value="{!! $course_resources-> title !!}" placeholder="Title">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label for="inputDescription" class="col-sm-4 control-label">Description: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="inputDescription" name="description">{!! $course_resources->description !!}</textarea>
                        </div>
                    </div>
                    

                     <div class="form-group">
                        <label for="Image" class="col-sm-4 control-label">Upload File:</label>
                        <div class="col-sm-8">
                            <input type="file" class="field" id="File" name="file_path">
                             
                        </div>
                    </div><br>

					<div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection