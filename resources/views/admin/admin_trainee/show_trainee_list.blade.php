@extends('admin/layouts.master')
@section('title', 'All Trainee')
@section('content')
	
    <div class="container col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2> Trainees Information </h2>
                    </div>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                     @endforeach
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (empty($trainees))
                        <h3>There are no trinee</h3>
                    @else
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($trainees as $trainee)
                                <?php $i++ ?>
                                    <tr>
                                        <td> {!! $i !!}  </td>
                                     	<td> <a href="{!! action('AdminController@trainee_by_user_id', $trainee->id) !!}">{!! $trainee->name !!}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
        </div>
@endsection

