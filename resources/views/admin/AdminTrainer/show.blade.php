@extends('admin.layouts.master')
@section('title', 'Trainer')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
      <div class="container">
        <div class="row">
          <div class="col-md-2">

          </div>
            <div class="col-md-6">
              <div class="well">
                @if($trainer == null)
                  <h3> Details are not submitted yet!</h3>
                @else
                    <div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 style="overflow:hidden" class="panel-title"><span class="pull-left">{!! $trainer->name !!}</span></h3>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-3 col-lg-3 " align="center"><img src="{{ asset($trainer->filePath) }}"   class="img-circle img-responsive" /></div> 
            
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
                                             <tr>
                                        <td>Gender</td>
                                        <td>Male</td>
                                      </tr>
                                        <tr>
                                        <td>Education :</td>
                                        <td>{!! $trainer->educational_qualification !!}</td>
                                      </tr>
                                      <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:info@support.com">{!! $trainer->email !!}</a></td>
                                      </tr>
                                        <td>Phone Number</td>
                                        <td>{!! $trainer->cell_number !!}
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
                                   <a href="{!! action('AdminTrainersController@adminEdit', $trainer->id) !!}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                </span>
                            </div>             
                          </div>   
                  @endif
              </div>
            </div>
             
          </div>
      </div>
  </section>
@endsection
