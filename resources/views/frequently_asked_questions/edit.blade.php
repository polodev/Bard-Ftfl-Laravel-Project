@extends('admin.layouts.master')
@section('title', 'View FAQS')
@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component" style="background-color: #43A047; color:white; font-size:larger" align="center"><h1>Frequently Asked Questions</br>(FAQs)</h1></div>
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label"><font color="#009688" size="5">Training Name</font></label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputList" class="col-md-2 control-label"></label>
                            <div class="col-md-10">
                                <select class="form-control" name="training_id">
                                    @foreach($trainings as $training)
                                        <option value="{!! $training->id !!}">{!!$training->training_name!!}</option>
                                    @endforeach
                                </select>
                                </br>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-lg-2 control-label"><font color="#009688" size="3">Author Name</font></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="author" placeholder="author" name="author_name" value="{!! $faqs->author_name !!}">
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"><font color="#009688" size="3">Question</font></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="???" name="question" value="{!! $faqs->question !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"><font color="#009688" size="3">Answer</font></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="answer" placeholder="Answer" name="answer">{!! $faqs->answer !!}</textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1" align="center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection