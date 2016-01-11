@extends('admin.layouts.master')
@section('title', 'Trainers')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
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
                    <legend><strong>Update the Trainer Information</strong></legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="name" value="{!! $trainer->name !!}">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-10">                            
                            <input class="form-control"  id="content" name="gender" value="{!! $trainer->gender!!}">
                        </div>
                        
                    </div>

                    

                   

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Educational Qualification</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="educational_qualification" value="{!! $trainer->educational_qualification !!}">
                            
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Date Of Birth</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="date_of_birth" value="{!! $trainer->date_of_birth !!}">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content"  name="email" value="{!! $trainer->email !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="country" value="{!! $trainer->country !!}">
                        </div>
                    </div>

                    

                    
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Skill Set</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="skill_set" value="{!! $trainer->skill_set !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Previous Experience</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="previous_experience" value="{!! $trainer->previous_experience !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Cell Number</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="cell_number" value="{!! $trainer->cell_number !!}">
                            
                        </div>
                    </div>
                         <div class="form-group">
                          <label for="image"  class="col-lg-2 control-label">Change image</label>
                           <div class="col-lg-5">
                          <input name="image" type="file" id="Image" name='image'>
                        </div>


                   

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection 
