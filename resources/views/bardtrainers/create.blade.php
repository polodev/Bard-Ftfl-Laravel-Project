@extends('admin.layouts.master')

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
    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <form class="form-horizontal"  method="post" enctype="multipart/form-data">
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
                    <div ><center><h2>Bangladesh Academy for Rural Development</h2>
                      <h4> Kotbari, Comilla</h4>
                    <legend><u><h3>BARD Trainers Information Sheet</h3></u></legend>
					 
						</center>  <br/>   
					</div>
                        
                            
                    <div class="form-group" >
                        <label for="name" class="col-lg-2 control-label">Name<span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control red-star" id="name" placeholder="Name" name="name"  value="{{ old('name')}}"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gender <span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-4">
                            <input type="radio" class=""  name="gender" value="Male" >Male
                            <input type="radio" class=""  name="gender" value="Female">Female
                        </div>
                        
                    </div>
               
                    <div class="form-group">
                        <label for="eduQualification" class="col-lg-2 control-label">Educational Qualification<span class="red-star" style="color:red">*</span></label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="eduQualification" placeholder="Educational Qualification" name="educational_qualification" value="{{ old('educational_qualification')}}">
                        </div>
					 </div>

                     
					 <div class="form-group">
                        <label for="skillSet" class="col-lg-2 control-label">	Skill Set <span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="skillSet" placeholder="Skill Set" name="skill_set" value="{{ old('skill_set')}}">
                        </div>
					 </div>	
						
						<div class="form-group">
                        <label for="preExperience" class="col-lg-2 control-label">Previous Experience<span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="preExperience" placeholder="Previous Experience" name="previous_experience" value="{{ old('previous_experience')}}">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="date" class="col-lg-2 control-label">Date Of Birth<span class="red-star" style="color:red">*</span> </label>
                       <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="text" class="form-control" name="date"  value="{{ old('date')}}" placeholder="1990/11/11"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar" ></span></span>
                        </div>
                    </div>
                    </div>
					
					<div class="form-group">
                        <label for="cellNumber" class="col-lg-2 control-label">Cell Number</label>
                        <div class="col-lg-5">
                            <input type="number" class="form-control" id="cellNumber" placeholder="Cell Number" name="cell_number" value="{{ old('cell_number')}}">
                        </div>
                      </div>

					  <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email<span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email')}}" required>
                        </div>
                      </div>
					 
                      <div class="form-group">
                        <label for="country" class="col-lg-2 control-label">Country<span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="country"  name="country" value="{{ old('country')}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="country" class="col-lg-2 control-label">Designation<span class="red-star" style="color:red">*</span> </label>
                        <div class="col-lg-5">
                            <textarea type="text" class="form-control" id="description" placeholder="add your designation of bard" name="description" >{{ old('description')}}</textarea>
                        </div>
                      </div>
                         
                          <div class="form-group">
                          <label for="image"  class="col-lg-2 control-label">Choose an image</label>
                           <div class="col-lg-5">
                          <input name="image" type="file" id="Image" name='image'>
                        </div>
                            
                    

                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-2">
                         <button class="btn btn-default" type="reset">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection 
