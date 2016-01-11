@extends('admin.layouts.master')
@section('title', 'Testimonial')
<style>
    div {
        text-align: justify;
        text-justify: inter-word;
    }
</style>
<script>
    function check(){
        return confirm("Are You Sure? You Want To Delete This Testimonial.");
    }
</script>

@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component" style="background-color:#43A047; color:white; font-size:larger"><h1 align="center">TESTIMONIALS</h1></div>
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($testimonials->isEmpty())
                <label>No Testimonial</label><br><hr>
            @else
                @foreach($testimonials as $testimonial)
                    <div>
                        @foreach($trainings as $training)
                            @if($testimonial->training_id==$training->id)
                                <h3 style="color:seagreen">Training Name :&nbsp; {!! $training->training_name !!}</h3>
                            @endif
                        @endforeach
                        <p>{!! $testimonial->testimonial !!}</p><br>
                        <i>Written by &nbsp;&nbsp;{!! $testimonial->author_name !!}</i>&nbsp;&nbsp;On&nbsp;{!! $testimonial->created_at !!}
                        <form method="post" action="{!! action('TestimonialController@destroy', $testimonial->id) !!}" class="pull-right">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-warning" onclick="return check()">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div><br><br><br><br>
                @endforeach
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
@endsection