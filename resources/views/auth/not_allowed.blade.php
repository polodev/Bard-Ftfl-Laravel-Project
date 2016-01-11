@extends('master/master')
@section('title', '')
@section('script')
<link href="{!! asset('not_allowed_asset/style.css') !!}" rel="stylesheet" type="text/css" media="all" />
@section('content')
	<div class="wrap">
		
		<div class="content">	
			<div class="logo">
				<marquee behavior="alternate"><h4><img src="{!! asset('/not_allowed_asset/bg.ico') !!}"/></h4></marquee>
			</div>
			<div class="col-md-4 col-md-offset-4">
				<div class="text-center alert alert-warning">
					<p>SORRY!! You are not authorized to see this page!</p><br>
					<h3>Please Log In As {{ $role }}<a href="{!!URL::to('/auth/logout')!!}" class="btn btn-lg btn-warning">Log Out</a></h3>
				</div>
			</div>
		</div>
	</div>

@endsection 