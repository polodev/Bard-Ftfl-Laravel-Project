@extends('master_trainer/master')
@section('title', 'View a course resource')
@section('content')
    
     <section class="container col-md-10 col-md-offset-2">
       <div class="container">
            <div class="row">
                
                <label>Course Name</label>
                <p>{!! $course_resources->course_name !!}</p>

                <label>Title</label>
                <p>{!! $course_resources->title !!}</p>

                <label>Description</label>
                <p>{!! $course_resources->description !!}</p>

                <label>Uploaded File</label>
                <p> <a href="{!! asset('course_resource/'.$course_resources->file_path) !!}">{!! $course_resources->file_path !!} </a></p>
            </div>
        </div>
                        
                
    </section>
@endsection