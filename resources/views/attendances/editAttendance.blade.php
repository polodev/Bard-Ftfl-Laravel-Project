
@extends('master_trainer/master')
@section('script')
    <link href="{!! asset('css/datepicker.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function(){
            $('#datePicker')
                    .datepicker({
                        format: 'yyyy/mm/dd'
                    })
        });
    </script>
@show

@section('content')

    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component">
            <div ><center><h3>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h3>
                    <legend><u><h3>Attenance Sheet</h3></u><small>(For Trainees)</small></legend>
                     </center>  <br/><br/>  <br/>
            </div>
            <form class="form-horizontal" action="{!! action('AttendanceController@updateAttendance') !!}" method="post">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
				   <div class="col-md-12">
				        <div class="col-md-4">
                        <label for="inputTrainingName" class="control-label"><h4>Course Name: {{ $course_name }}</h4></label>
                        
                            <input type="hidden" value="{{ $course_id }}" name="course_id">
                       
                    </div>
					<div class="col-md-4">
                        <label for="inputTrainingName" class="control-label"><h4>Session: {{ $session }}</h4></label>
                             <input type="hidden" name="session" value="{{ $session }}">
                    </div>
					<div class="col-md-4">
                        <label><h4>Date : {{ $date }}</h4></label>
                        <input type="hidden" value="{{ $date }}" class="form-control" name="date" placeholder="1990/11/11"/>
					</div>
					
				   </div>
				</div><br>
                    
                    
                    <table class="table table-hover" >
                            <thead>
                            <tr>
                                <th>Name</th>

                                <th>Attendence</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainee_list as $trainee)
                                <tr>

                                    <td>{{ $trainee->name }}</td>
                                    <td>
                                        <input type="radio" name="ta__{!! $trainee->id !!}" value="P" @foreach($current_attendance as $attendance) @if($trainee->id==$attendance->trainee_id && $attendance->trainee_attendance=='P') {!! "checked" !!}@endif @endforeach>Present
                                        <input type="radio" name="ta__{!! $trainee->id !!}"value="A" @foreach($current_attendance as $attendance) @if($trainee->id==$attendance->trainee_id && $attendance->trainee_attendance=='A') {!! "checked" !!}@endif @endforeach>Absent
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                   
                    <div class="form-group">
                        <div class="col-md-10 col-lg-offset-1" align="center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
               
            </form>
        </div>
    </div>
@endsection

