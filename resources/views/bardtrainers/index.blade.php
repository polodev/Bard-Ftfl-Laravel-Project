@extends('admin.layouts.master')
@section('title', 'BARDTrainer')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
  	<style>
		hr { 
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			margin-left: auto;
			margin-right: auto;
			border-style: inset;
			border-width: 1px;
			background-color:#009688;
		} 
	</style>
    <div class="container">
        <div class="row">
          
            <div class="col-md-10 col-lg-offset-1">
				<div class="well">
					<div class="panel panel-info">
						
							@foreach ($errors->all() as $error)
							<p class="alert alert-danger">{{ $error }}</p>
							@endforeach
							@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
							@endif
							@if ($bardtrainers->isEmpty())
								<p> There is no data in database.</p>
							@else
							@foreach($bardtrainers as $bardtrainer)
							<h3 style="overflow:hidden" class="panel-title"><span class="pull-left"></span></h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class=" col-md-8 col-lg-8 "> 
									<div class="col-md-5 col-lg-5 " align="center"> <img src="{{ asset($bardtrainer->filePath) }}" class="img-rounded img-responsive"> </div>
									<div class=" col-md-3 col-lg-3">
										<h4 style="color:#0D47A1"><!--<a href="{!! action('BardTrainersController@show', $bardtrainer->slug) !!}">!-->{!! $bardtrainer->name !!} </a></h4>
										      
                                              <h5  style="color:#b71c1c">  {!! $bardtrainer->description !!} , BARD.</h5> 
										      From: {!! $bardtrainer->country !!}<br>
											  Email:{!! $bardtrainer->email !!}<br> 
											  Phone Number:{!! $bardtrainer->cell_number !!}<br>
											 
											
							
									</div>
								</div>
								<div class=" col-md-4 col-lg-4 ">
									<h4><b>Description :</b></h4>
									Educational Qualification : {!! $bardtrainer->educational_qualification !!}<br>Skill Set : {!! $bardtrainer->skill_set !!}<br>Year of experience : {!! $bardtrainer->previous_experience !!}
								     <br>  Date of Birth: {!! $bardtrainer->date_of_birth !!}<br>
								</div> 
								<a href="{!! action('BardTrainersController@edit', $bardtrainer->slug) !!}" class="btn btn-info">Edit</a>
								<a href="{!! action('BardTrainersController@destroy', $bardtrainer->slug) !!}" class="btn btn-danger">Delete</a>
							</div>
							<hr>
						@endforeach
								
						</div>
						@endif           
					</div>               
				</div>
			</div>
			
        </div>
    
</section>

@endsection
