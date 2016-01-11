@extends('master.trainee_master')
@section('title', 'View a course resource')
@section('content')
       <div class="container">
            <div class="row">
                <br><br>
                <div class="col-md-6 col-md-offset-3 well">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Course Name</th>
                            <td>{!! $course_resources->course_name !!}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{!! $course_resources->title !!}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $course_resources->description !!}</td>
                        </tr>
                        <tr>
                            <th>Uploaded File</th>
                            <td><a href="{!! asset('course_resource/'.$course_resources->file_path) !!}">{!! $course_resources->file_path !!} </a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
           </div>

@endsection