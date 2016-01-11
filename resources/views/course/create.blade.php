@extends('admin.layouts.master')
@section('title', 'Form')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
        	 <h3 class="text-center">Add a Course</h3>
           
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
                            <input type="text" class="form-control" id="inputCourseName" name="course_name"  value="{{ old('course_name')}}" placeholder="Course Name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputIntroduction" class="col-sm-4 control-label">Introduction: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="introduction" >{{{ Input::old('introduction') }}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputObjectives" class="col-sm-4 control-label">Objectives:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputObjectives" name="objectives" value="{{ old('objectives')}}"  placeholder="Objectives">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputCourseContents" class="col-sm-4 control-label">Course Contents: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputCourseContents" name="course_contents" value="{{ old('course_contents')}}" placeholder="Course Contents">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputTrainingMethods" class="col-sm-4 control-label">Traning Methods:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputTrainingMethods" name="training_methods" value="{{ old('training_methods')}}" placeholder="Training Methods">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputParticipants" class="col-sm-4 control-label">Participants:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputParticipants" name="participants" value="{{ old('participants')}}"  placeholder="Participants">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDuration" class="col-sm-4 control-label">Duration: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputDuration" name="duration" value="{{ old('duration')}}" placeholder="Duration">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAcademicStaff" class="col-sm-4 control-label">Academic Staff:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAcademicStaff" name="academic_staff" value="{{ old('academic_staff')}}"  placeholder="Academic Staff">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCourseFee" class="col-sm-4 control-label">Course Fee: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputCourseFee" name="course_fee" value="{{ old('course_fee')}}" placeholder="Course Fee">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputAccommodationAndFood" class="col-sm-4 control-label">Accommodation and Food:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAccommodationAndFood" name="accommodation_and_food" value="{{ old('accommodation_and_food')}}"placeholder="Accommodation and Food">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputLibrary" class="col-sm-4 control-label">Library:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputLibrary" name="library" value="{{ old('library')}}" placeholder="Library">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAward" class="col-sm-4 control-label">Award:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAward" name="award" value="{{ old('award')}}" placeholder="Award">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAddressForCorrespondence" class="col-sm-4 control-label">Address for Correspondence:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAddressForCorrespondence" name="address_for_correspondence" value="{{ old('address_for_correspondence')}}" placeholder="Address for Correspondence">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputTrainingName" class="col-sm-4 control-label">Training Name: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="training_id">
                             
                                @foreach($trainings as $training)
                                <option value="{{ $training->id }}">{{ $training->training_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="Image" class="col-sm-4 control-label">Course Image:</label>
                        <div class="col-sm-8">
                            <input type="file" class="field" id="Image" name="course_image">
                             <p class="help-block">Dimention Home Page: 240px X 140px (image must be smaller than 150KB)<br/>Dimention Slide: 480px X 306px(image must be smaller than 150KB)</p>
                        </div>
                    </div>

					<div class="form-group">
						<label for="inputTrainer" class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Add Course</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
@endsection