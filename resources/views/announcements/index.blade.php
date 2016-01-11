@extends('admin.layouts.master')
@section('title', 'All Announcements')
<script>
    function check(){
        return confirm("Are You Sure? You Want To Delete This Announcement's Information.");
    }
</script>

<style>
    td:hover{
        background-color: #E6EE9C;
    }

</style>
@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #4DB6AC; color: white;" align="center">
                <h2> Announcements </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($announcement->isEmpty())
                <h2>No Announcements </h2>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr style="color: seagreen">
                        <th><h2>Heading</h2></th>
                        <th><h2>Update</h2></th>
                        <th><h2>Delete</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcement as $announcement)
                        <tr>
                            <td><a href="{!! action('AnnouncementController@edit', $announcement->id) !!}"><font size="4">{!! $announcement->heading !!} &nbsp;&nbsp; Publish on {!! $announcement->created_at !!}</font> </a></td>
                            <td><a href="{!! action('AnnouncementController@edit', $announcement->id) !!}" class="btn btn-info pull-left">Edit</a></td>
                            <td><a href="{!! action('AnnouncementController@destroy', $announcement->id) !!}" class="btn btn-warning" onclick="return check()">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
