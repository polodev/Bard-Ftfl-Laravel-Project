@extends('master.trainee_master')
@section('title', 'Contact')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
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
                    <legend>Commenting system</legend>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" placeholder="Say what you have to say" name="content"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-info">POST</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection