
@extends('admin.layouts.master')
@section('script')

@show

@section('content')

    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><!--<center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>-->
                <legend align="center"><u><h3>ATTENDANCE SHEET</h3></u><small>(For Trainees)</small></legend>
                <!-- <h4><b>Name of Training Course  : 3<sup>rd</sup> FTFL Foundation Training Course<br/>
                         Participants                : FTFL Trainers of Bangladesh Computer Council<br/>
                         Duration                    : 01 August - 29 October 2015</b></h4> </center>  <br/><br/>  <br/>-->
            </div>
            <form class="form-horizontal" method="post" action="{!! action('AttendanceController@editAttendance') !!}">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <div class="well well bs-component">
                        <label for="inputTrainingName"><h4><strong>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $date }}</h4></label>
                        <input type="hidden" value="{{ $date }}" class="form-control" name="date" placeholder="1990/11/11"/></br>
                        <label for="inputTrainingName"><h4><strong>COURSE NAME :</strong> {{ $course_name }}</h4></label></br>
                        <label for="inputTrainingName"><h4><strong>SESSION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> {{ $session_name }}</h4></label>
                        </br>
                        </br>
                        <table class="table table-hover">
                            <thead>
                            <tr style="background-color:lightseagreen;color:white">
                                <th><h4>Present Trainee</h4></th>
                                <th><h4>Absent Trainee</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><h4> @foreach($present_att as $trainee)
                                            {!! $trainee !!}<br><br>
                                        @endforeach
                                    </h4></td>
                                <td><h4>
                                        @foreach($absent_att as $trainee)
                                            {!! $trainee !!}<br><br>
                                        @endforeach
                                    </h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

