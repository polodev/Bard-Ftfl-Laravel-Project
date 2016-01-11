@extends('master_trainer/master')
@section('title', 'View all courses')
@section('content')

    <div class="container">

        <h2> List of uploaded file </h2>

        @if (empty($course_resources))
            <p>You didn't upload any file yet</p>
        @else
            <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>COURSE NAME</th>
                            <th>TITLE</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($course_resources as $course_resource)
                            <tr>  
                                <td>{!! $course_resource->course_name !!} </td>

                                 <td>
                                    <a href="{!! action('CourseResourcesController@show', $course_resource->id) !!}">{!! $course_resource->title !!} </a>
                                </td>
                                <td>
                                    <a href="{!! action('CourseResourcesController@edit', $course_resource->id) !!}" class="btn btn-info pull-left">Edit</a>
                                    <form method="post" action="{!! action('CourseResourcesController@destroy', $course_resource->id) !!}" class="pull-left">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                               
                            </tr>
                      
                        @endforeach

                        </tbody>
                    </table>
            </div>
        @endif

    </div>

@endsection