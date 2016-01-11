
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    
    <link rel="stylesheet" href="{!! asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}">

<link rel="stylesheet" href="{!! asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}">
   <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">
     <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('plugins/iCheck/flat/blue.css') !!}">
     <!-- Morris chart -->
    <link rel="stylesheet" href="{!! asset('plugins/morris/morris.css') !!}">
   <!-- jvectormap -->
    <link rel="stylesheet" href="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('plugins/datepicker/datepicker3.css') !!}">
<!-- Daterange picker -->
    <link rel="stylesheet" href="{!! asset('plugins/daterangepicker/daterangepicker-bs3.css') !!}">
 <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{!! asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="{!! asset('/css/roboto.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/material.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/ripples.min.css') !!}" rel="stylesheet">
     @yield('script')
    <![endif]-->
    <link rel="stylesheet" href="{!! asset('assets/course-style/style.css') !!}">
    <style>
        @yield('style')
    </style>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper" style="background-color:#00796B">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo" style="background-color:#00695C">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="dist/img/images.jpg" class="img-circle"></span>
          <!-- logo for regular state and mobile devices -->
          <div class="pull-left image">
              <img src="dist/img/images.jpg" class="img-circle" alt="">
          </div>
          <span class="logo-lg"><font color="white"><b>BARD</b>Admin</font></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color:#00695C">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            
          </a>
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
               
                <ul class="dropdown-menu">
                 
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      
                     
                    
                    </ul>
                  </li>
                  
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                
                <ul class="dropdown-menu">
                
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
               
              
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
              
                  
                  
                    
                    
                      <a href="{{ URL::to('/auth/logout') }}">Sign out</a>
                    
             
                
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
         <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="background-color:#00796B">
            <!-- Sidebar user panel -->
            <!-- search form -->
           
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header" style="background-color:#004D40"><font color="white">MAIN NAVIGATION</font></li>
                <li class="{{ (strpos(URL::current(), URL::to('/calendar/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/calendar'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-calendar"></i> <span><font color="white">Calendar</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (strpos(URL::current(), URL::to('/calendar/create'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/calendar/create') }}"><i class="fa fa-circle-o"></i><font color="white"> Create Calendar</font></a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/calendar'))!== false) ? 'active' : '' }}"><a href="{{ URL::to('/calendar') }}"><i class="fa fa-circle-o"></i><font color="white"> All Calendar</font></a></li>

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/user_traininginfo/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/user_traininginfo'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span><font color="white">Training Trainee Assign</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/user_traininginfo/create') }}"><i class="fa fa-circle-o"></i><font color="white"> Training Trainee Assign</font></a></li>
                        <li class=""><a href="{{ URL::to('/user_traininginfo') }}"><i class="fa fa-circle-o"></i><font color="white"> All Training Trainee</font></a></li>

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/trainer_course/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/trainer_course'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">

                        <i class="fa fa-link"></i> <span><font color="white">Trainer Course Assign</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/trainer_course/create') }}"><i class="fa fa-circle-o"></i><font color="white"> Trainer Course Assign</font></a></li>
                        <li class=""><a href="{{ URL::to('/trainer_course') }}"><i class="fa fa-circle-o"></i><font color="white"> All Trainer Course</font></a></li>
                    </ul>
                </li>

                <li class="{{ (strpos(URL::current(),  URL::to('/BARD_journal'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/BARD_journal/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/volume'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/volume/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/issue'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/issue/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/file'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/file/create'))!== false) ? 'treeview active' : '' }}">
                       <a href="#">
                        <i class="fa fa-book"></i> <span><font color="white">Journal</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="URL::to('/BARD_journal'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_journal') }}"><i class="fa fa-circle-o"></i> All Journal</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/BARD_journal/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_journal/create') }}"><i class="fa fa-circle-o"></i> Create Journal</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/volume'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/volume') }}"><i class="fa fa-circle-o"></i> All Volume</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/volume/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/volume/create') }}"><i class="fa fa-circle-o"></i> Create Volume</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/issue'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/issue') }}"><i class="fa fa-circle-o"></i> All issue</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/issue/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/issue/create') }}"><i class="fa fa-circle-o"></i> Create issue</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/file'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/file') }}"><i class="fa fa-circle-o"></i> all Paper</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/file/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/file/create') }}"><i class="fa fa-circle-o"></i> Create Paper</a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(), URL::to('/project'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/project/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/BARD_modules'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/BARD_modules/create'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span><font color="white">Projects</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (strpos(URL::current(), URL::to('/project'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/project') }}"><i class="fa fa-circle-o"></i> all Projects</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/project/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/project/create') }}"><i class="fa fa-circle-o"></i> Create Projects</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/BARD_modules'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_modules') }}"><i class="fa fa-circle-o"></i> all Modules</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/BARD_modules/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_modules/create') }}"><i class="fa fa-circle-o"></i> Create Modules</a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(), URL::to('/category'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/category/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/book'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/book/create'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span><font color="white">Books</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (strpos(URL::current(), URL::to('/category'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/category') }}"><i class="fa fa-circle-o"></i> all Category</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/category/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/category/create') }}"><i class="fa fa-circle-o"></i> Create Category</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/BARD_book'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_book') }}"><i class="fa fa-circle-o"></i> all Book</a></li>
                        <li class="{{ (strpos(URL::current(), URL::to('/BARD_book/create'))!== false) ? 'treeview active' : '' }}"><a href="{{ URL::to('/BARD_book/create') }}"><i class="fa fa-circle-o"></i> Create Book</a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/selectTraining'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/traineeCourse'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span><font color="white">Trainee Course Assign</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/selectTraining') }}"><i class="fa fa-circle-o"></i><font color="white"> Trainee Course Assign</font></a></li>
                        <li class=""><a href="{{ URL::to('/traineeCourse') }}"><i class="fa fa-circle-o"></i><font color="white"> All Trainee Course</font></a></li>

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/marksheet'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span><font color="white">Marksheet</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/marksheet') }}"><i class="fa fa-circle-o"></i><font color="white"> Marksheet</font></a></li>
{{--                        <li class=""><a href="{{ URL::to('/listOfstudentsAndMarks') }}"><i class="fa fa-circle-o"></i><font color="white"> All Trainee Course</font></a></li>--}}

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/exam/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/exam'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span><font color="white">Exam</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/exam/create') }}"><i class="fa fa-circle-o"></i><font color="white"> Create Exam</font></a></li>
                        <li class=""><a href="{{ URL::to('/exam') }}"><i class="fa fa-circle-o"></i><font color="white"> All Exam</font></a></li>

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/registration/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/registration'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span><font color="white">Trainee Registration</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/registration/create') }}"><i class="fa fa-circle-o"></i><font color="white"> Registration</font></a></li>
                        <li class=""><a href="{{ URL::to('/registration') }}"><i class="fa fa-circle-o"></i><font color="white"> All registration</font></a></li>

                    </ul>
                </li>
                {{--Following created by localhost--}}
                <li class="{{ (strpos(URL::current(),  URL::to('admin/clients'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/clients/create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/clients/create_newsletter'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span><font color="white">Clients</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('admin/clients') }}"><i class="fa fa-circle-o"></i><font color="white">All Clients</font></a></li>
                        <li class=""><a href="{{ URL::to('/clients/create') }}"><i class="fa fa-circle-o"></i><font color="white">Create Client</font></a></li>
                        <li class=""><a href="{{ URL::to('/clients/create_newsletter') }}"><i class="fa fa-circle-o"></i><font color="white">Send Newsletter</font></a></li>

                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/user/all'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(), URL::to('/user/registration'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-user"></i> <span><font color="white">Users</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/user/all') }}"><i class="fa fa-circle-o"></i><font color="white">All Users</font></a></li>
                        <li class=""><a href="{{ URL::to('/user/registration') }}"><i class="fa fa-circle-o"></i><font color="white">Create User</font></a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/courses'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/create_course'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span><font color="white">Course</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/courses') }}"><i class="fa fa-circle-o"></i><font color="white">All Coures</font></a></li>
                        <li class=""><a href="{{ URL::to('/create_course') }}"><i class="fa fa-circle-o"></i><font color="white">Create Course</font></a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/bardtrainer_create'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span><font color="white">BardTrainers</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! URL::to('bardtrainers') !!}"><i class="fa fa-circle-o"></i><font color="white"> BardTrainers</font></a></li>
                                <li class=""><a href="{{ URL::to('/bardtrainer_create') }}"><i class="fa fa-circle-o"></i><font color="white">Create BardTrainer</font></a></li>
                        
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),  URL::to('/slider/all'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/slider/create'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-picture-o"></i> <span><font color="white">Slider Management</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/slider/all') }}"><i class="fa fa-circle-o"></i><font color="white">All slider</font></a></li>
                        <li class=""><a href="{{ URL::to('/slider/create') }}"><i class="fa fa-circle-o"></i><font color="white">Add New</font></a></li>
                    </ul>
                </li>
                <li class="{{ (strpos(URL::current(),   URL::to('/select_training'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),   URL::to('/select_course/'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),   URL::to('/view_trainee_report/'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),   URL::to('/view_health_report/'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),   URL::to('/view_single_report/'))!== false) ? 'treeview active' : '' }} ">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span><font color="white">Report</font></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/select_training') }}"><i class="fa fa-circle-o"></i><font color="white">All report</font></a></li>
                    </ul>
                </li>

                <li class="{{ (strpos(URL::current(),  URL::to('/training_info'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/trainings'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('adminTrainers'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/create_testimonial'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/testimonials'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/create_frequently_asked_question'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/frequently_asked_questions'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span><font color="white">Trainings</font></span>
                       
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/training_info') }}"><i class="fa fa-circle-o"></i><font color="white">Create Training</font></a></li>
                        <li class=""><a href="{{ URL::to('/trainings') }}"><i class="fa fa-circle-o"></i><font color="white"> Training List</font></a></li>
                        <li class="{{ (strpos(URL::current(),  URL::to('adminTrainers'))!== false) ? 'treeview active' : '' }}">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span><font color="white">Trainers</font></span>
                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{!! URL::to('adminTrainers') !!}"><i class="fa fa-circle-o"></i><font color="white">Trainer List</font></a></li>
                            </ul>
                        </li>
                        <li class="{{ (strpos(URL::current(),  URL::to('/create_testimonial'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/testimonials'))!== false) ? 'treeview active' : '' }}">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span><font color="white">Testimonial</font></span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{ URL::to('/create_testimonial') }}"><i class="fa fa-circle-o"></i><font color="white">Create Testimonial</font></a></li>
                                <li><a href="{{ URL::to('/testimonials') }}"><i class="fa fa-circle-o"></i><font color="white"> Testimonial List</font></a></li>
                            </ul>
                        </li>
                        <li class="{{ (strpos(URL::current(),  URL::to('/create_frequently_asked_question'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/frequently_asked_questions'))!== false) ? 'treeview active' : '' }}">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span><font color="white">FAQs</font></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::to('/create_frequently_asked_question') }}"><i class="fa fa-circle-o"></i><font color="white"> Create FAQs</font></a></li>
                                <li><a href="{{ URL::to('/frequently_asked_questions') }}"><i class="fa fa-circle-o"></i><font color="white"> FAQs List</font></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                        

               
                
                <li class="{{ (strpos(URL::current(),  URL::to('/announcement_create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/announcements'))!== false) ? 'treeview active' : '' }}">
                   
                       
               <li class="{{ (strpos(URL::current(),  URL::to('/announcement_create'))!== false) ? 'treeview active' : '' }} || {{ (strpos(URL::current(),  URL::to('/announcements'))!== false) ? 'treeview active' : '' }}">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span><font color="white">Announcement</font></span>
                       
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ URL::to('/announcement_create') }}"><i class="fa fa-circle-o"></i><font color="white">Create Announcement</font></a></li>
                        <li><a href="{{ URL::to('/announcements') }}"><i class="fa fa-circle-o"></i><font color="white"> Announcement List</font></a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section><!-- /.content -->




    </div><!-- /.content-wrapper -->


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      <footer class = "main-footer">
        <div class="col-md-12">
             <strong>Copyright &copy;  <a href="http://bard.com.bd">BARD</a>.</strong> All rights reserved.
        </div>
    </footer>
    </div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{!! asset('plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- Morris.js charts -->
<script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') !!}"></script>
<script src="{!! asset('plugins/morris/morris.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('plugins/sparkline/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap -->
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('plugins/knob/jquery.knob.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') !!}"></script>
<script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- datepicker -->
<script src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('plugins/fastclick/fastclick.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/app.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>
  </body>
</html>
