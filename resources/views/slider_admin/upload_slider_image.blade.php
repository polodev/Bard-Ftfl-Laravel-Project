@extends('admin/layouts/master')
@section('title', 'upload a slider image')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="text-center">Add a Slider image</h2>
                    <br><br>
                    <div class="well">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            @if(session('status'))
                                <p class="alert alert-success">{{ session('status') }}</p>
                            @endif
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <fieldset>
                                <br>
                                <div class="form-group">
                                    <label for="heading_text" class="col-lg-2 control-label">Heading Text</label>
                                    <div class="col-lg-10">
                                        <input value="{{ old('heading_text') }}" type="text" class="form-control" id="heading_text" placeholder="Heading Text" name="heading_text">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="paragraph_text" class="col-lg-2 control-label">paragraph Text</label>
                                    <div class="col-lg-10">
                                        <input value="{{ old('paragraph_text') }}" type="text" class="form-control" id="paragraph_text" placeholder="paragraph text" name="paragraph_text">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="button_text" class="col-lg-2 control-label">Button Text</label>
                                    <div class="col-lg-10">
                                        <input value="{{ old('button_text') }}" type="text" class="form-control" id="button_text" placeholder="Button Text" name="button_text">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="button_url" class="col-lg-2 control-label">Button URL</label>
                                    <div class="col-lg-10">
                                        <input value="<?php echo old('button_url') ?  old('button_url') :  'http://' ?>" type="text" class="form-control" id="button_url" placeholder="Button URL" name="button_url">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="slider_image" class="col-lg-2 control-label">Upload image</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="slider_image" value="{{ old('slider_image') }}">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <input class="btn btn-info" type="submit" name="" id="">
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
