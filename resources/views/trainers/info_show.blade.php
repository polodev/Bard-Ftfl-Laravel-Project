@extends('master_trainer/master')
@section('title','Trainer')
@section('content')
	<section class="content-2" style="background-color: rgb(255, 255, 255);">
		@if(empty($info))
                <div class="container">
                	<h3>Details are not submitted yet!!</h3>
                </div>
        @else
        <div class="container">
            <div class="row">
				
                <div class="col-md-3 col-lg-3">
                    
					<div class="well">
				        <h3>To Add New Exam <br><a href="{!! URL::to('/exam_create') !!}" class="btn btn-lg btn-success active">Click Here</a></h3>
				    </div>
				    <br>
				    <div class="well">
				        <h3>To View Marks Sheet<br><a href="{!! URL::to('/listOfstudentsAndMarks') !!}" class="btn btn-lg btn-info">Click Here</a></h3>
				    </div>
					
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="well">
                    	
                    	
						<div class="panel panel-info">
							<div class="panel-heading">
								
								<h3 class="panel-title"    >{!! $info->name !!}</h3>
							  
							</div>
							<div class="panel-body">
								<div class="row">
										<div class="col-md-3 col-lg-5 " align="center"> <img src="{{ asset($info->filepath) }}" class="img-rounded img-responsive"> </div>
									<div class=" col-md-9 col-lg-9 "> 
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td>ID Code:</td>
													<td>{!! $info->trainee_id !!}</td>
													<td></td>
												</tr>
												<tr>
													<td>Birth Place:</td>
													<td>Bangladesh</td>
													<td></td>
												</tr>
												<tr>
													<td>Birth Date:</td>
													<td>{!! $info->date_of_birth !!}</td>
													<td></td>
												</tr>
												
											   <tr>
													<td>Gender:</td>
													<td>{!! $info->gender!!}</td>
													<td></td>
												</tr>
												<tr>
													<td>Home Address:</td>
													<td>{!! $info->district !!}  </td>
													<td></td>
												</tr>
												<tr>
													<td>Email:</td>
													<td><a href="">tahmi@yahoo.com</a></td>
													<td></td>
												</tr>
												<tr>
													<td>Phone Number:</td>
													<td>{!! $info->ph_mobile !!}</td>
													<td></td>
											   
												</tr>
												
												<tr>
													<td><a href="{!! URL::to('/') !!}" class="btn btn-lg btn-info"  style="background-color:#AA00FF" >Exam Marks</a></td>
													<td><a  href="{!! URL::to('/') !!}" class="btn btn-info" style="background-color:#64DD17">Log Out</a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>            
						</div>
						
                    </div>	
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="well">
	                      <h3>To Update Trainee Info forms<a href="{!! action('TrainersController@trainees_info', $trainer_id) !!}" class="btn btn-lg btn-info active">Click Here</a></h3>
	                  </div>
	                  <br>
	                  <div class="well">
	                      <h3>To Add Trainee Attendance<br><a href="{!! URL::to('/attendance_preform') !!}" class="btn btn-lg btn-success active">Click Here</a></h3>
	                  </div>
					
					
                </div>
            </div>
        </div>
        @endif
    </section>
@endsection