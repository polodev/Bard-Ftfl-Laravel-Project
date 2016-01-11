@extends('admin.layouts.master')
@section('title', 'Create a Client Profile')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
                <h2 class="text-center">Create a New User Role</h2>
                <br><br>
                <div class="well">
                    <form class="form-horizontal" method="post">
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
                                <label for="role_name" class="col-lg-2 control-label">Role name <sup style="color: red;">*</sup></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="role_name" placeholder="Role Name" name="role_name" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="role_slug" class="col-lg-2 control-label">Role slug <sup style="color: red;">*</sup></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="role_slug" placeholder="Role Slug" name="role_slug" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role_level" class="col-lg-2 control-label">Role Level <sup style="color: red;">*</sup></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="role_level" placeholder="Role Level" name="role_level" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="role_description" class="col-lg-2 control-label">Role Description <sup style="color: red;">*</sup></label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" id="role_description" name="role_description" placeholder="Role Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button class="btn btn-default" type="reset">Cancel</button>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
