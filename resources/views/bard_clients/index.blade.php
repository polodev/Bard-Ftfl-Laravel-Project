@extends('master/master')
@section('title', 'Clients')
@section('content')
    <section class="content-2" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($clients->isEmpty())
                        <p>There is no Clients</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Clients Name</th>
                                <th>Clients Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($clients as $client)
                                <?php $i++ ?>
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td> {!!  $client->client_name  !!} </td>
                                    <td>{!! $client->client_email !!}</td>
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
