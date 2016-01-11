@extends('master.trainee_master')
@section('title', 'View all courses')
@section('content')

    <div class="container">
        @if (empty($course_resources))
            <p> There is no file available.</p>
        @else
            <div class="row">
                <h2 class="text-center">Available Course resources for download</h2>
                <br><br><br>
                <div class="col-md-offset-2 col-md-8">
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
                                    <a href="{!! action('CourseResourcesController@single_resource_for_trainee', $course_resource->id) !!}">{!! $course_resource->title !!} </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

@endsection