@extends('admin.layouts.master')
@section('title', 'Trainers')
@section('content')
	<div class="container col-md-8 col-md-offset-2">
	        <div class="well well bs-component">
	            <form class="form-horizontal"  method="post">
	             @foreach ($errors->all() as $error)
	        <p class="alert alert-danger">{{ $error }}</p>
	             @endforeach
	             @if (session('status'))
	                <div class="alert alert-success">
	                    {{ session('status') }}
	                </div>
	            @endif

	<div class="well well bs-component">
	    <div class="content">

	        <h2 class="header">{!! $bardtrainer->name !!}</h2>
	       <p>  {!! $bardtrainer->name !!} </p>
	      
	        <p>  {!! $bardtrainer->country !!} </p>
	    </div>
	   <a href="{!! action('BardTrainersController@edit', $bardtrainer->slug) !!}" class="btn btn-info">Edit</a>
	       
	   
	</div>
@endsection 
