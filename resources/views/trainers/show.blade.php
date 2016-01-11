@extends('master_trainer/master')
@section('title', 'Trainer')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
      @if($trainer == null)
            <div class="container">
                <div class="well">
                        <h3>Details is not submitted yet!<a href="{!! URL::to('/trainer_create') !!}" class="btn btn-lg btn-info" style="background-color:#69F0AE">Fill The Form</a></h3>
                  </div>
            </div>            
        @else
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="well">
                <h3>To Add New Exam <br><a href="{!! URL::to('/exam_create') !!}" class="btn btn-lg btn-success active">Click Here</a></h3>
            </div>
            <br>
            <div class="well">
                <h3>To View Marks Sheet<br><a href="{!! URL::to('/listOfstudentsAndMarks') !!}" class="btn btn-lg btn-info">Click Here</a></h3>
            </div>
            <div class="well">
                <h3>To View Health Information<br><a href="{!! URL::to('/listOfstudentsAndMarks') !!}" class="btn btn-lg btn-info">Click Here</a></h3>
            </div>
          </div>
            <div class="col-md-6">
              <div class="well">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 style="overflow:hidden" class="panel-title"><span class="pull-left">{!! $trainer->name !!}</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                       <div class="col-md-3 col-lg-3 " align="center"><img src="{{ asset($trainer->filePath) }}"   class="img-responsive" /></div>
  
                      <div class=" col-md-9 col-lg-9 "> 
                        <table class="table table-user-information">
                          <tbody>
                             
                            <tr>
                              <td>Country:</td>
                              <td>{!! $trainer->country !!}</td>
                            </tr>
                            <tr>
                              <td>Date of Birth</td>
                              <td>{!! $trainer->date_of_birth !!}</td>
                            </tr>
                               
                            <tr>
                              <td>Gender</td>
                              <td>{!! $trainer->gender !!}</td>
                            </tr>
                            <tr>
                              <td>Education :</td>
                              <td>{!! $trainer->educational_qualification !!}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td><a href="mailto:info@support.com">{!! $trainer->email !!}</a></td>
                            </tr>
                            <tr>
                              <td>Phone Number</td>
                              <td>{!! $trainer->cell_number !!}</td>   
                            </tr>   
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer">
                      <a href="{!! URL::to('/allresources') !!}" title="show files" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-file"></i></a>
                      <span class="pull-right">
                         <a href="{!! action('TrainersController@edit', $trainer->id) !!}" title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                          <a href="{!! URL::to('/resources') !!}" title="Upload a file" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-upload"></i></a>
                      </span>
                  </div>             
                </div>               
              </div>
            </div>
              <div class="col-md-3">
                  <div class="well">
                      <h3>To Update Trainee Info forms<a href="{!! action('TrainersController@trainees_info', $trainer->trainer_id) !!}" class="btn btn-lg btn-info active">Click Here</a></h3>
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
