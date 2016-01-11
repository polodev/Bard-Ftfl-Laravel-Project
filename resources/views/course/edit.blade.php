@extends('admin.layouts.master')
@section('title', 'Edit a course')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <h2 class="text-center">Update Course Info</h2>
        <br>
        <div class="well well bs-component">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                        <label for="inputCourseName" class="col-sm-4 control-label">Course Name: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputCourseName" name="course_name" value="{!! $courses->course_name !!}" placeholder="Course Name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputIntroduction" class="col-sm-4 control-label">Introduction: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="introduction">{!! $courses->introduction !!}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputObjectives" class="col-sm-4 control-label">Objectives:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputObjectives" name="objectives" value="{!! $courses->objectives !!}" placeholder="Objectives">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputCourseContents" class="col-sm-4 control-label">Course Contents: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputCourseContents" name="course_contents" value="{!! $courses->course_contents !!}"placeholder="Course Contents">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputTrainingMethods" class="col-sm-4 control-label">Training Methods:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputTrainingMethods" name="training_methods" value="{!! $courses->training_methods !!}" placeholder="Training Methods">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputParticipants" class="col-sm-4 control-label">Participants:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputParticipants" name="participants" value="{!! $courses->participants !!}" placeholder="Participants">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDuration" class="col-sm-4 control-label">Duration: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputDuration" name="duration" value="{!! $courses->duration !!}" placeholder="Duration">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAcademicStaff" class="col-sm-4 control-label">Academic Staff:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAcademicStaff" name="academic_staff" value="{!! $courses->academic_staff !!}" placeholder="Academic Staff">
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="inputCourseFee" class="col-sm-4 control-label">Course Fee: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputCourseFee" name="course_fee" value="{!! $courses->course_fee !!}" placeholder="Course Fee">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAccommodationAndFood" class="col-sm-4 control-label">Accommodation and Food:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAccommodationAndFood" name="accommodation_and_food" value="{!! $courses->accommodation_and_food !!}"placeholder="Accommodation and Food">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputLibrary" class="col-sm-4 control-label">Library:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputLibrary" name="library" value="{!! $courses->library !!}" placeholder="Library">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAward" class="col-sm-4 control-label">Award:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAward" name="award" value="{!! $courses->award !!}"placeholder="Award">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAddressForCorrespondence" class="col-sm-4 control-label">Address for Correspondence:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputAddressForCorrespondence" name="address_for_correspondence" value="{!! $courses->address_for_correspondence !!}" placeholder="Address for Correspondence">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputTrainingName" class="col-sm-4 control-label">Training Name: <span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="training_id" value="{!! $courses->training_name !!}" >
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
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection