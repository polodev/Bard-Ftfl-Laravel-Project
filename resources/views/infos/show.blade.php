@extends('master/master')
@section('title', 'Trainee')
@section('content')
	<div class="well well bs-component">
	        <div class="content">

	            <h2 class="header">{!! $info->name !!}</h2>
	            <p> <strong>Trainee Id</strong>: {!! $info->trainee_id !!}</p>
	            <p> {!! $info->institution !!} </p>
	        </div>
	       <a href="{!! action('InfosController@edit', $info->trainee_id) !!}" class="btn btn-info">Edit</a>
	       
	</div>
@endsection
    