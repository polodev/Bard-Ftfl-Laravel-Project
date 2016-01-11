
@extends('master_trainer/master')
@section('script')

@show

@section('content')

 <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component">
             <div ><center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>
                    <legend><u><h3>Attendance Sheet</h3></u><small>(For Trainees)</small></legend>
                     </center>  <br/><br/>  <br/>
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
                    <div >
                        <label for="inputTrainingName" class="col-lg-3 control-label" ><h4>Course Name: {{ $course_name }}</h4></label>
                        <div class="col-lg-2">
                            <input type="hidden" value="{{ $course_id }}" name="course_id">
                        </div>
                    </div>
                        <div>
                        <label for="inputTrainingName" class="col-lg-3 control-label"for="inputTrainingName" class="col-lg-3 control-label"><h4>Session: {{ $session }}</h4></label>
                            <div class="col-lg-2">
                                <input type="hidden" name="session" value="{{ $session }}">
                            </div>
                        </div>                  
                            <div>
                                <label for="inputTrainingName" class="col-lg-3 control-label"><h4>Date : {{ $date }}</h4></label>
                                <input type="hidden" value="{{ $date }}" class="form-control" name="date" placeholder="1990/11/11"/>
                            </div>
                    <div class="well">
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
                    <div class="" align="center">
                        <input type="submit" class='btn btn-info' value="Edit">
                    </div>

                </fieldset>
            </form>
        </div>

    </div>
@endsection

