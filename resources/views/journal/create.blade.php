@extends('admin/layouts/master')
@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><center>Journal</center></h2>
				</div>

				@foreach ($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
				@endforeach
				@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                
				{!!Form::open(['route'=>'BARD_journal.store','files'=> true])!!}
		        <div class="form-group">
		            {!!Form::label('Title :')!!}
		            {!!Form::text('title',null,['class'=>'form-control'])!!}
		        </div>
		        <div class="form-group">
		            {!!Form::label('Description :')!!}
		            {!!Form::textarea('description',null,['class'=>'form-control'])!!}
		        </div>
		        <div class="form-group">
		            {!!Form::label('Frequency :')!!}
		            {!!Form::text('frequency',null,['class'=>'form-control'])!!}
		        </div>
		        <div class="form-group ">
			        {!! Form::label('Image ')!!}<br>
			        {!! Form::file('img', ['class' => 'field','id' => 'img_path'])!!}
			        <p class="help-block">Dimention Home Page: 240px X 140px (image must be smaller than 150KB)<br/>Dimention Slide: 480px X 306px(image must be smaller than 150KB)</p>
			    </div>
		        <div class="form-group">
		            {!!Form::label('Language :')!!}
		            {!!Form::text('language',null,['class'=>'form-control'])!!}
		        </div>


		        <div class="form-group">

		            {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
		        </div>


				{!!Form::close()!!}
				
			</div>
		</div>

	</div>

@endsection