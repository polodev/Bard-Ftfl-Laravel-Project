@extends('admin.layouts.master')
@section('title', 'Create a Clients Profile')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="row">
                <h2 class="text-center">Send Newsletter to All Clients</h2>
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
                                <label for="subject" class="col-lg-2 control-label">Subject</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="subject" placeholder="Email Subject" name="email_subject" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email_body" class="col-lg-2 control-label">Email Body</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" id="email_body" name="email_body" placeholder="Email Body" required></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button class="btn btn-default" type="reset">Cancel</button>
                                    <button type="submit" class="btn btn-info">Send Newsletter</button>
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
