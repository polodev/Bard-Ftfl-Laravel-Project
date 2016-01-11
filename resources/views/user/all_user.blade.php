@extends('admin.layouts.master')
@section('content')
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-md-offset-1 col-md-8">
                    <form method="post" action="{{ URL::to('user/search') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Name: </label>
                                    <input checked type="radio" name="search_term" value="name"  id="name">
                                    <label for="email">Email: </label>
                                    <input type="radio" name="search_term" value="email"  id="email">
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="search_keyword" class="form-control" placeholder="Search for...">
                                  <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Search</button>
                                  </span>
                                </div>
                            </div>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div> {{--End row--}}
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_details as $user)
                        <tr>
                            <td>{!! $user['user_name'] !!}</td>
                            <td>{!! $user['user_email'] !!}</td>
                            <td>{!! $user['user_role'] !!}</td>
                            @if( $user['user_role'] == "admin" )
                                <td>Can not delete or update admin</td>
                            @else
                                <td>
                                    <a href="{!! action('UsersController@edit_user', $user['user_id']) !!}" class="btn btn-info pull-left">Edit</a>
                                    <form method="post" action="{{ URL::to('/user/single/'.$user['user_id'].'/delete') }}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <button type="submit" onclick="return checkDelete()" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
       function checkDelete(){
           return confirm('Would you like to delete this User');
       }
    </script>
@endsection
