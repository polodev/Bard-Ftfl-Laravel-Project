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
                <li class="@if(isset($index))active @endif"><a href="{{ URL::to('/') }}" class="">HOME</a></li>

                <li class="@if(isset($trainings))active @endif dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">TRAINING <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('/public_trainings') }}">All Training</a></li>
                        <li><a href="{{ URL::to('/trainers') }}">Trainers</a></li>
                        <li><a href="{{ URL::to('/trainees') }}">Trainees</a></li>
                    </ul>
                </li>
                <li class="@if(isset($trainings))active @endif dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PUBLICATIONS <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('/public_journal') }}">Journals</a></li>
                        <li><a href="{{ URL::to('/public_project') }}">Project Papers</a></li>
                        <li><a href="{{ URL::to('/public_category') }}">Books</a></li>
                    </ul>
                </li>
                <li class="@if(isset($faculty))active @endif"><a href="{{ URL::to('/bardtrainer') }}" class="">FACULTY</a></li>
                <li><a href="{{ URL::to('/calendar_public') }}" class="">CALENDAR</a></li>
                <li class="@if(isset($about))active @endif"><a href="{{ URL::to('/aboutus') }}" class="">ABOUT</a></li>
                <li class="@if(isset($gallery))active @endif"><a href="{{ URL::to('/gallery') }}" class="">GALLERY</a></li>
                <li class="@if(isset($contact))active @endif"><a href="{{ URL::to('/contact') }}" class="">CONTACT</a> </li>
                @if(Auth::guest())
                    <li><a href="{{ URL::to('/auth/login') }}">LOGIN</a></li>
                @else
                    <li><a href="{{ URL::to('/auth/logout') }}">SIGN OUT</a> </li>
                @endif


            </ul>
        </div>
    </div>
</nav>