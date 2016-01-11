@extends('master_trainer/master')
@section('title', 'Trainer')
@section('content')
 <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>All the Trainees</h2>
                </div>
                @if (empty($infos))
                    <p> There is no data in database.</p>
                @else
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach($infos as $info)
                            <?php $i++ ?>
                                <tr>
                                    <td>{!! $i !!}</td>
                                    <td> <a href="{!! action('TrainersController@show_info', $info->id) !!}">{!! $info->name !!} </a> </td>                                   
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>
@endsection