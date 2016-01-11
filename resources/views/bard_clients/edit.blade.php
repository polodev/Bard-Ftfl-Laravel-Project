@extends('admin.layouts.master')
@section('title', 'Update a Clients Profile')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="text-center">Update Client Info</h2>
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
                                    <label for="client_name" class="col-lg-2 control-label">Client Name</label>
                                    <div class="col-lg-10">
                                        <input value="{{ $client->client_name }}" type="text" class="form-control" id="client_name" placeholder="Client Name" name="client_name">
                                        <input value="{{ $client->client_logo }}" type="hidden"  name="client_logo">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="client_email" class="col-lg-2 control-label">Client Email</label>
                                    <div class="col-lg-10">
                                        <input value="{!! $client->client_email !!}" type="email" class="form-control" id="client_email" placeholder="Client Email" name="client_email">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="client_phone_number" class="col-lg-2 control-label">Client Phone Number</label>
                                    <div class="col-lg-10">
                                        <input value="{!! $client->client_phone_number !!}" type="text" class="form-control" id="client_phone_number" placeholder="Client Phone Number" name="client_phone_number">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="client_address" class="col-lg-2 control-label">Client Address</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="5" id="client_address" name="client_address" placeholder="Client Address"> {!! $client->client_address !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="client_logo_update" class="col-lg-2 control-label">Update logo</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="client_logo_update" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-info">Update</button>
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
