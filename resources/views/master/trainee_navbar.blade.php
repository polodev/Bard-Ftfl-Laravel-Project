<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{!! asset('assets/images/logo.jpg') !!}" alt=""></a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{(strcmp(URL::full(), URL::to('/trainee')) == 0) ? 'active' : ''}}"><a href="{{URL::to('/trainee')}}" class="">HOME</a></li>
                <li class="{{ (strpos(URL::current(), URL::to('feedbackCreate'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/feedbackCreate') }}" class="">FEEDBACKS</a></li>

                
                <li class="{{ (strpos(URL::current(), URL::to('UserHealthCreate'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/UserHealthCreate') }}" class="">HEALTHINFOS</a> </li>

                <li class="@if(isset($about))active @endif"><a href="{{ URL::to('/registration') }}" class="">REGISTRATION</a></li>
                {{--<li class="@if(isset($about))active @endif"><a href="{{ URL::to('/registration/'.Auth::user()->id.'/edit') }}" class="">REGISTRATION</a></li>--}}

                <li class="{{ (strpos(URL::current(), URL::to('trainee_create'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/trainee_create') }}" class="">INFORMATION</a> </li>
                <li class="{{ (strpos(URL::current(), URL::to('/forums'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/forums') }}" class="">FORUMS</a> </li>
                <li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/auth/logout') }}" class="">LOGOUT</a> </li>

            </ul>
        </div>
    </div>
</nav>