@extends('admin.layouts.master')
@section('title', 'Announcement')
@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" id="announcementform">
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
                    <legend align="center"><font color="#004D40" size="15"><i>Announcement</i></font></legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"><font color="#009688" size="3">Heading&nbsp;<span class="red-star" style="color:red">*</span></font></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Give a heading" name="heading" value="{{ old('heading')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"><font color="#009688" size="3">Content&nbsp;<span class="red-star" style="color:red">*</span></font></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="content" placeholder="Write content" name="content" value="">{{ old('content')}}</textarea>

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
    <script>
        $(document).ready(function() {
            $('#announcementform').bootstrapValidator({
                container: '#messages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    heading: {
                        validators: {
                            notEmpty: {
                                message: 'Heading is required and cannot be empty'
                            }
                        }
                    },
                    content: {
                        validators: {
                            notEmpty: {
                                message: 'Content is required and cannot be empty'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection