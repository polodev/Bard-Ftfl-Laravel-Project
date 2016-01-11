@extends('admin/layouts.master')
@section('title', 'View all courses')
<style>
    .all_report  i.fa {
        display: block;
        margin-top: 50px;
        margin-bottom: 20px;
        font-size: 40px;
    }
    .all_report .col-md-3 {
        margin-bottom: 20px;
    }

    .btn-square{
        width: 14em;
        height: 14em;
    }
    .btn-square a span{
        display: block;
    }
</style>
@section('content')
    <div class="container all_report">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-square btn-lg btn-primary"  href="{!! action('AttendanceController@AdminAllAttendance', $course_id) !!}"><i class="fa fa-users"></i> <span>Attendance</span></a>
            </div>
            <div class="col-md-3">
                <a class="btn btn-square btn-lg btn-info"  href="{{ URL::to('/MarksheetAdmin/'.$course_id.'/listTraineesForMarks') }}"><i class="fa fa-graduation-cap"></i> Mark Sheet</a>
{{--                <a class="btn btn-square btn-lg btn-info"  href="{!! action('MarksheetAdminController@index', $course_id) !!}"><i class="fa fa-graduation-cap"></i> Mark Sheet</a>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-square btn-lg btn-warning"  href="{!! URL::to('/view_health_report/'.$course_id) !!}"><i class="fa fa-medkit"></i>Health report</a>
            </div> 
             <div class="col-md-3">

                <a class="btn btn-square btn-lg btn-success"  href="{!! url('registration') !!}"><i class="fa fa-user"></i> Registration</a>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-3">

                <a style="background-color: #FFC107; color: #fff;" class="btn btn-square btn-lg"  href="{!! action('AdminController@trainees_by_course_id', $course_id) !!}"><i class="fa fa-info"></i> Information</a>

         <a class="btn btn-square btn-lg btn-success"  href="{!! url('registration') !!}"><i class="fa fa-user"></i> Registration</a>
            </div>
           
        </div>
    </div>
@endsection



