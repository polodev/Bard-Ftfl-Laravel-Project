@extends('master.master')
@section('title', 'FAQs')
<style>
    label{
        color: #009688;
        font-size: larger;
    }
    hr{
        background-color: #E6EE9C;
    }
</style>
@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component">
            <div class="well well bs-component" style="background-color: #43A047; color:white; font-size:larger" align="center"><h1>Frequently Asked Questions</br>(FAQs)</h1></div>
            <div class="content">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if($FAQs->isEmpty())
                    <p>No Questions and Answer Retaled to this Training Name.</p>
                @else
                    @foreach($FAQs as $FAQ)
                        <label>Question</label>
                        <p>{!! $FAQ->question !!}</p>
                        <label>Answer</label><hr>
                        <p>{!! $FAQ->answer !!}</p>
                        <h6><i>Written By</i> &nbsp; &nbsp;{!! $FAQ->author_name !!}</h6>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection