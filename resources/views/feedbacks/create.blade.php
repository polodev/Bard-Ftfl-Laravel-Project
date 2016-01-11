@extends('master.trainee_master')
@section('title', 'Add A feedback')
@section('content')
   <div class="container">
       <div class = "row">

           <div class="col-md-1 col-lg-1">

           </div>
           <div class="col-md-8 col-lg-8">
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


                       <form class="form-horizontal" id="productForm" method="post" action="/feedbackCreate">
                       <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Speaker's Name</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="trainer_id" id="sel1">
                                       @foreach($trainers as $trainer)
                                        <option value="{{ $trainer->trainer_id }}">{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <div id="messages"></div>
                                </div>
                            </div>
                           @foreach($errors->all() as $error)
                               <p class="alert alert-danger">{{ $error }}</p>
                           @endforeach

                           @if(session('status'))
                               <div class="alert alert-success">
                                   {{ session('status') }}
                               </div>
                           @endif

                            <legend>A. Speaker's Style</legend>

                           <div class="form-group">
                               <label class="col-md-6 control-label"> </label>
                               <div class="col-lg-4">
                                   <h5 align ="left">5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</h5>
                               </div>

                           </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b> A1. S/he spoke loud enough </b></h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="A1" value="5" /> </label>
                                            <label><input type="radio" name="A1" value="4" /> </label>
                                            <label><input type="radio" name="A1" value="3" /> </label>
                                            <label><input type="radio" name="A1" value="2" /> </label>
                                            <label><input type="radio" name="A1" value="1" /> </label>
                                        </div>

                                </div>


                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b> A2. S/he spoke clearly and at a good pace</b> </h4></label>

                                        <div class="radio">
                                            <label><input type="radio" name="A2" value="5" /> </label>
                                            <label><input type="radio" name="A2" value="4" /> </label>
                                            <label><input type="radio" name="A2" value="3" /> </label>
                                            <label><input type="radio" name="A2" value="2" /> </label>
                                            <label><input type="radio" name="A2" value="1" /> </label>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b> A3. S/he spoke loud enough. S/he used good eye contact,body language and non-verbal communication skills</b> </h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="A3" value="5" /> </label>
                                            <label><input type="radio" name="A3" value="4" /> </label>
                                            <label><input type="radio" name="A3" value="3" /> </label>
                                            <label><input type="radio" name="A3" value="2" /> </label>
                                            <label><input type="radio" name="A3" value="1" /> </label>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"> <h4 align = "left"><b>A4. Speaker's Rapport building with participants</b> </h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="A4" value="5" /> </label>
                                            <label><input type="radio" name="A4" value="4" /> </label>
                                            <label><input type="radio" name="A4" value="3" /> </label>
                                            <label><input type="radio" name="A4" value="2" /> </label>
                                            <label><input type="radio" name="A4" value="1" /> </label>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b> A5. Speaker's Interaction with Participants</b></h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="A5" value="5" /> </label>
                                            <label><input type="radio" name="A5" value="4" /> </label>
                                            <label><input type="radio" name="A5" value="3" /> </label>
                                            <label><input type="radio" name="A5" value="2" /> </label>
                                            <label><input type="radio" name="A5" value="1" /> </label>
                                        </div>

                                </div>

                                <legend>B. Presentation Content</legend>
                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"> <b> B1. Presentation topic was useful and of interest to me personally</b> </h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="B1" value="5" /> </label>
                                            <label><input type="radio" name="B1" value="4" /> </label>
                                            <label><input type="radio" name="B1" value="3" /> </label>
                                            <label><input type="radio" name="B1" value="2" /> </label>
                                            <label><input type="radio" name="B1" value="1" /> </label>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b>B2. The presentation meterial was well-organized and easy to follow </b></h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="B2" value="5" /> </label>
                                            <label><input type="radio" name="B2" value="4" /> </label>
                                            <label><input type="radio" name="B2" value="3" /> </label>
                                            <label><input type="radio" name="B2" value="2" /> </label>
                                            <label><input type="radio" name="B2" value="1" /> </label>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-lg-6 control-label"><h4 align = "left"><b> B3. The Speaker was prepared and Knowledgeable on the topic </b></h4></label>
                                        <div class="radio">
                                            <label><input type="radio" name="B3" value="5" /> </label>
                                            <label><input type="radio" name="B3" value="4" /> </label>
                                            <label><input type="radio" name="B3" value="3" /> </label>
                                            <label><input type="radio" name="B3" value="2" /> </label>
                                            <label><input type="radio" name="B3" value="1" /> </label>
                                        </div>

                                </div>

                            <legend>Additional Comments(If Any):</legend>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea align="left" class="form-control" rows="5" id="comment" name = "comments"></textarea>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" align="center">Add Feedback</button>

                    </form>
                    </div>
           </div>
           <div class="col-md-3 col-lg-3">

                   <div class="col-md-12">
                       <div class = "well">
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

                           <div>
                               <legend><h5 align = "left">Highest<-------------------------->Lowest</h5></legend>
                               <legend><h5 align ="left">5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</h5></legend>
                           </div>

                   </div>
               </div>
           </div>
    </div>
</div>
@endsection