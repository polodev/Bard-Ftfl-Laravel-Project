@extends('master_trainer/master')
@section('title', 'View all courses')
@section('content')

    <div class="container">

        <h2> List of uploaded file </h2>

        @if (empty($course_resources))
            <p> There is no file available.</p>
        @else
            <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>COURSE NAME</th>
                            <th>TITLE</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($course_resources as $course_resource)
                            <tr>  
                                <td>{!! $course_resource->course_name !!} </td>

                                 <td>
                                    <a href="{!! action('CourseResourcesController@show_trainee', $course_resource->id) !!}">{!! $course_resource->title !!} </a>
                                </td>
                               
                               
                            </tr>
                      
                        @endforeach

                        </tbody>
                    </table>
            </div>
        @endif

    </div>

@endsection