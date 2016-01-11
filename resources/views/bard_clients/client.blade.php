@extends('admin.layouts.master')
@section('title', 'Client')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row content">
                <br><br>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-responsive img-thumbnail" src="{{ asset('uploads/'. $client->client_logo) }}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <h2>Client Name: </h2>
                        <p>{{ $client->client_name }}</p>
                        <h2>Client Email: </h2>
                        <p>{{ $client->client_email }}</p>
                        <h2>Client Phone Number: </h2>
                        <p>{{ $client->client_phone_number }}</p>
                        <h2>Address:</h2>
                        <p>Dhaka Bangladesh</p>
                        <h2>
                            <a href="{!! action('BardClientsController@edit', $client->id) !!}" class="btn btn-info pull-left">Edit</a>
                            <form method="post" action="{!! action('BardClientsController@destroy', $client->id) !!}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                        </h2>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
