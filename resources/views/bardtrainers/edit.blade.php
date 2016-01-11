@extends('admin.layouts.master')
@section('title', 'BARD Trainers')
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
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
                
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        @if(session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                        @endif
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend><strong>Update the BARD Trainer Information</strong></legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="name" value="{!! $bardtrainer->name !!}">
                            
                        </div>
                   
                <div class="form-group">
                    <label class="col-lg-2 control-label">Gender</label>
                    <div class="col-lg-10">
                        
                            @if($bardtrainer->gender == 'Male')
                                 <input type="radio"   name="gender" value="Male" checked>Male
                                 <input type="radio" name="gender" value="Female" >Female
                          
                            @elseif($bardtrainer->gender == 'Female')
                            <input type="radio" name="gender" value="Male" >Male
                            <input type="radio" name="gender" value="Female" checked>Female
                            @endif
                        
                    </div>
                </div>
                      
                     <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Educational Qualification</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="educational_qualification" value="{!! $bardtrainer->educational_qualification !!}">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content"  name="email" value="{!! $bardtrainer->email !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="country" value="{!! $bardtrainer->country !!}">
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-xs-3 control-label">Date of birth</label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="text" class="form-control" name="date" value="{!! $bardtrainer->date_of_birth !!}"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>

                    
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Skill Set</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="skill_set" value="{!! $bardtrainer->skill_set !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Previous Experience</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="previous_experience" value="{!! $bardtrainer->previous_experience !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Cell Number</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="cell_number" value="{!! $bardtrainer->cell_number !!}">
                            </div>
                            <div class="form-group">
                        <label for="country" class="col-lg-2 control-label">Designation</label>
                        
                        <div class="col-lg-5">

                    <textarea type="text" class="form-control" id="description" placeholder="description" name="description" > {!!$bardtrainer->description!!}</textarea>
                        </div>
                      </div>
                        </div>
                    </div>
                         <div class="form-group">
                          <label for="image"  class="col-lg-2 control-label">Change image</label>
                           <div class="col-lg-5">
                          <input name="image" type="file" id="Image" name='image' >
                        </div>


                   

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-info" type="reset">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection 
