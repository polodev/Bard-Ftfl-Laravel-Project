@extends('admin.layouts.master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-6 col-md-offset-2">
        <div class="well well bs-component">
			<fieldset>
                <h3 align="center"><b><u><i>SPEAKER EVALUATION FORM</i></u></b></h3>
                <br>
                <div class="form-group">
                    <div class="col-md-12">
                        <h4><b>1. Name of Training Course :</b> 3rd FTFL Foundation Training Course</h4>
                        <h4><b>2. Duration                :</b> 01 August-29 October 2015</h4>
                        </div>
                    <br>
                </div>
            </fieldset>


          @foreach($feedbacks as $feedback)
                @if(!$feedback->trainer_id)
                    <div class="alert alert-warning">
                    <span class=" glyphicon glyphicon-warning-sign " >
                        <strong>There is no feedback for this trainer !!</strong>
                    </span>
                    </div>
                @else 
               <form class="form-horizontal" id="productForm" method="post" action="">
                    <div class="form-group">
                        <label for="title" class="col-md-6 control-label">Speaker's Name: </label>
                        <h4>
                        <b>{!! $feedback->trainer->name !!}</b></h4>
                        
                    </div>
                       
             
                       
                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>A1. S/he spoke loud enough :</b></h5> </label>
                            <label class="col-lg-4 control-label"> {!! $feedback->voice_range !!} </label>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>A2. S/he spoke clearly and at a good pace</b></h5> </label>
                            <label class="col-lg-4 control-label"> {!! $feedback->voice_clearity !!} </label>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>A3. S/he spoke loud enough. S/he used good eye contact,body language and non-verbal communication skills</b></h5> </label>
                            <label class="col-lg-4 control-label"> {!! $feedback->communication_skills !!} </label>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>A4. Speaker's Rapport building with participants</b></h5> </label>
                            <label class="col-lg-4 control-label">{!! $feedback->rapport_building !!} </label>
                        </div>
                        
                         <div class="form-group">
                             <label class="col-lg-6 control-label"><h4 align = "left"><b> A5. Speaker's Interaction with Participants</b></h4></label>
                             <label class="col-lg-4 control-label"> <label>{!! $feedback->interaction !!}</label> </label>
                         </div>


                        <legend>B. Presentation Content</legend>

                        <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>B1. Presentation topic was useful and of interest to me personall</b></h5> </label>
                            <label class="col-lg-4 control-label"> {!! $feedback->topic_usefulness !!} </label>
                        </div>

                       <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>B2. The presentation meterial was well-organized and easy to follow</b></h5> </label>
                            <label class="col-lg-4 control-label">  {!! $feedback->material_organization !!} </label>
                       </div>

                      <div class="form-group">
                            <label class="col-lg-6 control-label"> <h5 align = "left"><b>B3. The Speaker was prepared and Knowledgeable on the topic</b></h5> </label>
                            <label class="col-lg-4 control-label">  {!! $feedback->speakers_knowledge !!} </label>
                      </div>

                   <div class="form-group">
                    <hr>
                       <label class="col-lg-6 control-label"> <h5 align = "left"><legend>Average of feedback is: </legend> </h5> </label>
                       <label class="col-lg-4 control-label"> {!! $avg !!}</label>

                   </div>
               </form>
            @endif
            @endforeach


    </div>
</div>
            
 
         <div class="row">

                      <div class="col-md-3">
                            <div class="well well bs-component">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Excellent</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Very Good</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Good</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Moderate</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Poor</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>


                         <div class="form-group">
                
                    <div class="">
                            <legend><h5 align = "left">Highest<------------------------->Lowest</h5></legend>
                            <legend><h5 align ="left">5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</h5></legend>
                    </div>
                            
            </div>
        </div>
                    
        </div>          
</div>
@endsection