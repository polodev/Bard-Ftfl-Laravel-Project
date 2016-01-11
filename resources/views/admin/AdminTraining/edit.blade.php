@extends('admin.layouts.master')
@section('title', 'Training Information')
@section('content')
<div class="container" style="background-color: white; color: black; font-size:larger">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Training Name</label>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputName" placeholder="" name="training_name" value="{!! $training->training_name !!}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Training Type</label>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputList" class="col-md-2 control-label"></label>
                            <div class="col-md-10">
                                <select class="form-control" name="training_type">
                                    <option value="{!! $training->training_type !!}">{!! $training->training_type !!}</option>
                                    <option value="{!! $training->training_type !!}">{!! $training->training_type !!}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <label for="inputName" class="control-label">Description</label>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="5" name="description">{!! $training->description !!}</textarea>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Information How to Apply</label>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="applying_information">{!! $training->applying_information !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Objectives</label>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="objectives">{!! $training->objectives !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <label for="inputSdate" class="control-label">Start Date</label>
                                    <input type="date" class="form-control" placeholder="" name="start_date" value="{!! $training->start_date !!}">
                                </div>
                                <div class="col-md-5">
                                    <label for="inputSdate" class="control-label">End Date</label>
                                    <input type="date" class="form-control" placeholder="" name="end_date" value="{!! $training->end_date !!}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Resources Provided by BARD to a Particular Training</label>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="provided_resources">{!! $training->provided_resources !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Information about Accommodation</label>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="accommodation">{!! $training->accommodation !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Daily Schedule</label>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="daily_schedule">{!! $training->daily_schedule !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Fees Structure</label>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="fees_structure">{!! $training->fees_structure !!}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="inputName" class="control-label">Responsible Person for Trainees</label>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="responsible_person">{!! $training->responsible_person !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection