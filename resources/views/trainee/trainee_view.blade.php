@extends('admin/layouts.master')
@section('title', 'All Trainee')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
                
                <div class="col-md-3 col-lg-3">
                    
         

              
          
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="well">
                      @if($trainee == null)
                        <h3> Details is not submitted yet!</h3>
                      @else
                       <div class="panel panel-info">

              <div class="panel-heading">
                
                <h3 class="panel-title"    >{!! $trainee->name !!}</h3>
                
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-5 " align="center"> <img src="{{ asset($trainee->filepath) }}" class="img-rounded img-responsive"> </div>
                  <div class=" col-md-9 col-lg-9 ">

                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>ID Code:</td>
                          <td>{!! $trainee->trainee_id !!}</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Birth Place:</td>
                          <td>Bangladesh</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Birth Date:</td>
                          <td>{!! $trainee->date_of_birth !!}</td>
                          <td></td>
                        </tr>
                        
                         <tr>
                          <td>Gender:</td>
                          <td>{!! $trainee->gender!!}</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Home Address:</td>
                          <td>{!! $trainee->district !!}  </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Email:</td>
                          <td>{!! $trainee->email !!}</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Phone Number:</td>
                          <td>{!! $trainee->ph_mobile !!}</td>
                          <td></td>
                         
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>            
            </div>
                      @endif
           
                    </div>  
                </div>
                <div class="col-md-3 col-lg-3">
                
                    
          
                </div>
            </div>
        </div>
    </section>
@endsection