@extends('admin.layouts.master')
@section('title', 'Trainers')
@section('content')
    <section class="content-2" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(empty($trainers))
                        <p>There is no Trainers</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Trainers</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($trainers as $trainer)
                                <?php $i++ ?>
                                <tr>
                                    <td scope="row">{{ $i }}</td>
                                    <td> <a href="{!! URL::to('admin_trainer_show/' . $trainer->id) !!}">{!!  $trainer->name  !!}</a> </td>
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
