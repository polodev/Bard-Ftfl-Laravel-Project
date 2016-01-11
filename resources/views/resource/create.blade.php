@extends('master_trainer/master')
@section('title', 'Form')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
        	 <h3 class="text-center">Add a File</h3>
           
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
                            <input type="text" class="form-control" id="inputTitle" name="title"  value="{{ old('title')}}" placeholder="Title">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label for="inputDescription" class="col-sm-4 control-label">Description: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="inputDescription" name="description"  value="{{ old('description')}}" placeholder="Description"> </textarea>
                        </div>
                    </div><br>
                    

                     <div class="form-group">
                        <label for="Image" class="col-sm-4 control-label">Upload File:</label>
                        <div class="col-sm-8">
                            <input type="file" class="field" id="File" name="file_path">
                             
                        </div>
                    </div>

					<div class="form-group">
						<label for="inputTrainer" class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
@endsection