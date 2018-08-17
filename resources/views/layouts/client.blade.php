<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Hospital Appoitment System</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datetime/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form-validation.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- nav fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
        <div class="navbar-wrapper">

            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand" href="index.html">
                          <h4 class="brand-text">Hospital Appoitment System</h4>
                        </a>
                    </li>

                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>

            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav float-right">

                        <!-- user's profile -->
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online">
                                    <img src="{{ asset('/img/github_acc_pic.png') }}" alt="avatar"><i></i></span>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('profile.edit', Auth::id()) }}">
                                    <i class="ft-user"></i> Edit Profile
                                </a>

                                <a class="dropdown-item" href="email-application.html">
                                    <i class="ft-mail"></i> My Inbox
                                </a>

                                <a class="dropdown-item" href="user-cards.html">
                                    <i class="ft-check-square"></i> Task
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" id="logout"><i class="ft-power"></i> Logout</a>
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav fixed-top-->

    <!-- menu bar -->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <?php
                    $route = Route::currentRouteName();
                    $routeName = explode('.', $route);
                ?>

                <li class="nav-item {{ ($routeName[0] === 'schedule')? 'active':'' }}">
                    <a href="{{ route('schedule.index') }}">
                        <i class="fa fa-calendar-o"></i>
                        <span class="menu-title" data-i18n="">Schedule</span>
                    </a>
                </li>

                <li class="nav-item {{ ($routeName[0] === 'doctor')? 'active':'' }}">
                    <a href="{{ route('doctor.index') }}">
                        <i class="fa fa-user-md"></i>
                        <span class="menu-title" data-i18n="">Doctor</span>
                    </a>
                </li>

                <li class=" nav-item {{ ($routeName[0] === 'department')? 'active':'' }}">
                    <a href="{{ route('department.index') }}">
                        <i class="fa fa-building-o"></i>
                        <span class="menu-title" data-i18n="">Department</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- menu bar -->

    @yield('content')

    <script src="{{ asset('js/vendors.min.js') }} " type="text/javascript"></script>

    <script src="{{ asset('js/app-menu.js') }} " type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }} " type="text/javascript"></script>

    <script src="{{ asset('js/select/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select/form-select2.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dateTime/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <!-- for validation -->
        <script src="{{ asset('js/jqBootstrapValidation.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/icheck/icheck.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/form-validation.js') }}" type="text/javascript"></script>
    <!-- for validation -->

    <script src="{{ asset('js/custom.js') }} " type="text/javascript"></script>
</body>
</html>