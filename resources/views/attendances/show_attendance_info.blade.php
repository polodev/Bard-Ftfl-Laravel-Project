@extends('layout.master')
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
            format: 'yyyy-mm-dd'
        })
    });
    </script>
@show

@section('content')

 <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
             <div ><center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>
                    <legend><u><h3>Attendence Sheet</h3></u><small>(For Trainees)</small></legend>
                    <h4><b>Name of Training Course  : 3<sup>rd</sup> FTFL Foundation Training Course<br/>
                        Participants                : FTFL Trainers of Bangladesh Computer Council<br/>
                        Duration                    : 01 August - 29 October 2015</b></h4> </center>  <br/><br/>  <br/>    
                    </div>
            <form class="form-horizontal"action="{!! action('AttendanceController@get_attendance_info') !!}" method="post">
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
                                       
                    <div class="panel panel-default">
						<div class="panel-heading">
							<center><h4>Trainee Attendence</h4></center>
						</div>
						 <div >
                        <label for="inputTrainingName" class="col-lg-2 control-label">Course Name:</label>
                        <div class="col-lg-2">
                            <select  name="course_id">
                                
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                    <label for="inputTrainingName" class="col-lg-2 control-label">Session:</label>
                            <div class="col-lg-2">
                                <select name="session">
                                    <option value="session1">Session 1</option>
                                    <option value="session2">Session 2</option>
                                    <option value="session3">Session 3</option>
                                    <option value="session4">Session 4</option>
                                </select> 
                            </div>
                        </div>
                            <div class="col-md-4">
                                <label>Date</label>
                                <div>
                                    <div class="input-group input-append date" id="datePicker">
                                        <input type="text" class="form-control" name="date" placeholder="1990/11/11"/>
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>


                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-2">
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

