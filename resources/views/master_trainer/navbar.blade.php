<nav class="navbar navbar-default" style="background-color: #00BCD4">
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
                <?php $id = Auth::user()->id; ?>
                <li class="@if(isset($trainer))active @endif"><a href="{{ URL::to('/trainer_show/'. $id) }}" class="">HOME</a></li>
                <li class="@if(isset($addexam))active @endif"><a href="{{ URL::to('/exam') }}" class="">EXAM</a></li>
                <li class="@if(isset($addexam))active @endif"><a href="{{ URL::to('/exam/create') }}" class="">ADD EXAM</a></li>
                <li class="@if(isset($marksheet))active @endif"><a href="{{ URL::to('/marksheet') }}" class="">MARKS</a> </li>

                <li class="@if(isset($traineeattendence))active @endif"><a href="{{ URL::to('/attendance_preform') }}" class="">TRAINEE ATTENDENCE</a> </li>
                <li class="@if(isset($traineeattendence))active @endif"><a href="{{ URL::to('auth/logout') }}" class="">LOGOUT</a> </li>

            </ul>
        </div>
    </div>
</nav>