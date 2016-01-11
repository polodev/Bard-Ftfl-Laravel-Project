@extends('master.master')
@section('title', 'View a course')
@section('content')
 <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">
	   <div class="container">
	   		<div class="row">
	   			<div class="col-md-8">
	   				<div class="content">
	                    <h3 class="header">Course Name:</h3>
						<p>{!! $courses->course_name !!}</p>

	                    <h3>Introduction:</h3>
	                    <p> {!! $courses->introduction !!} </p>

	                    <h3> Objectives:</h3> 
	                    <p> {!! $courses->objectives !!} </p>

	                    <h3> Course Contents:</h3>
	                    <p>  {!! $courses->course_contents !!} </p>


	                    <h3> Training Methods:</h3>
	                    <p>  {!! $courses->training_methods !!} </p>


	                    <h3>Participants:</h3> 
	                    <p>  {!! $courses->participants !!} </p>


	                    <h3> Academic Staff:</h3>
	                    <p>  {!! $courses->academic_staff !!} </p>


	                    <h3> Accommodation And Food:</h3>
	                    <p>  {!! $courses->accommodation_and_food !!} </p>

	                    <h3> Library:</h3>  
	                    <p> {!! $courses->library !!} </p>
	                    

	                    <h3> Award: </h3>
	                    <p>  {!! $courses->award !!} </p>
	                    

	                    <h3> Address of Correspondence:</h3>
	                    <p>  {!! $courses->address_for_correspondence !!} </p> 
	                </div>
	                
	   			</div>
	   			
	   			<div class="col-md-4">
	   				<div class="well">
						<div>
							<img src="{{asset ($courses->course_image) }}" style="width: 100%; height: auto" alt="Course Image">
						</div>
	   					<h3> Duration:</h3>
	                    <p>  {!! $courses->duration !!} </p>
	                    <h3> Course Fee:</h3>
	                     <p>{!! $courses->course_fee !!} </p>
						<h3> Training Name</h3> 
	                    <p>  {!! $training_name !!} </p>
	   				</div>
	   			</div>
	   		</div>
	   </div>
  </section>

@endsection