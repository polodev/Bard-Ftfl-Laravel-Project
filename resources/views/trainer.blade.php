@extends('master_trainer/master')
@section('title', 'Trainer')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="well">
                <h3>To Add New Exam <br><a href="{!! URL::to('/clients/create') !!}" class="btn btn-lg btn-success active" style="background-color: #FFD600">Click Here</a></h3>
            </div>
            <br>
            <div class="well">
                <h3>To View Marks Sheet<br><a href="{!! URL::to('/clients/create_newsletter') !!}" class="btn btn-lg btn-info" style="background-color: #E91E63">Click Here</a></h3>
            </div>
            <br>
             <div class="well">
                <h3>To View Health Information<br><a href="{!! URL::to('/trainingsCourse') !!}" class="btn btn-lg btn-info" style="background-color: #0000cd">Click Here</a></h3>
            </div>
          </div>
            <div class="col-md-6">
              <div class="well">
                <div class="panel panel-info">
                  <div class="panel-heading" style="background-color: #AA00FF">
                    <h3 style="overflow:hidden" class="panel-title"><span class="pull-left">Trainer Name</span><span class="pull-right"></span></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://1.viki.io/a/ph/avatar_profile-acc6c5a5a9d35bd7d292dfd776cfec76.png?s=210x210&cb=1" class="img-circle img-responsive"> </div>
  
                      <div class=" col-md-9 col-lg-9 "> 
                        <table class="table table-user-information">
                          <tbody>
                            <tr>
                              <td>Department:</td>
                              <td>Programming</td>
                            </tr>
                            <tr>
                              <td>Hire date:</td>
                              <td>06/23/2013</td>
                            </tr>
                            <tr>
                              <td>Date of Birth</td>
                              <td>01/24/1988</td>
                            </tr>
                         
                               <tr>
                                   <tr>
                              <td>Gender</td>
                              <td>Male</td>
                            </tr>
                              <tr>
                              <td>Home Address</td>
                              <td>Metro Manila,Philippines</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td><a href="mailto:info@support.com">info@support.com</a></td>
                            </tr>
                              <td>Phone Number</td>
                              <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                              </td>   
                            </tr>   
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer">
                      <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                      <span class="pull-right">
                          <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                      </span>
                  </div>             
                </div>               
              </div>
            </div>
              <div class="col-md-3">
                  <div class="well">
                      <h3>To Update Trainee Info forms<a href="{!! URL::to('trainees') !!}" class="btn btn-lg btn-info active" style="background-color: #e74c3c">Click Here</a></h3>
                  </div>
                  <br>
                  <div class="well">
                      <h3>To Add Trainee Attendence<br><a href="{!! URL::to('/attendance_preform') !!}" class="btn btn-lg btn-success active" style="background-color: #795548">Click Here</a></h3>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
