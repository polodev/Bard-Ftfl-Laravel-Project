@extends('admin.layouts.master')
@section('title', 'Clients')
@section('content')
    <section class="content-2" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if($clients->isEmpty())
                        <p>There is no Clients</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Clients Name</th>
                                <th>Clients Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($clients as $client)
                                <?php $i++ ?>
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td><a href="{!! URL::to('clients/'. $client->id) !!}">{!!  $client->client_name  !!}</a></td>
                                    <td>{!! $client->client_email !!}</td>
                                    <td>
                                        <a href="{!! action('BardClientsController@edit', $client->id) !!}" class="btn btn-info pull-left">Edit</a>
                                        <form method="post" action="{!! action('BardClientsController@destroy', $client->id) !!}">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
