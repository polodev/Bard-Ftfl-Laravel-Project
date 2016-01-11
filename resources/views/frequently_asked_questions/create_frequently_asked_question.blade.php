@extends('admin.layouts.master')
@section('title', 'Create FAQS')
@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component" style="background-color: #43A047; color:white; font-size:larger" align="center"><h1>Frequently Asked Questions(FAQs)</h1></div>
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
                                    @foreach($training_names as $training_name)
                                        <option value="{!! $training_name->id !!}"> {!! $training_name->training_name !!}</option>
                                    @endforeach
                                </select>
                                </br>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"><font color="#009688" size="3">Author Name&nbsp;<span class="red-star" style="color:red">*</span></font></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Author name" name="author_name" value="{{ old('author_name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"><font color="#009688" size="3">Question&nbsp;<span class="red-star" style="color:red">*</span></font></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Question?" name="question" value="{{ old('question')}}">
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"><font color="#009688" size="3">Answer&nbsp;<span class="red-star" style="color:red">*</span></font></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="answer" placeholder="Write answer" name="answer" value="">{{ old('answer')}}</textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1" align="center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection