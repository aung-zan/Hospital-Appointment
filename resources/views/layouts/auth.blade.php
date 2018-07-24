<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reservation System</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 300i, 400, 400i, 500, 500i%7COpen+Sans:300, 300i, 400, 400i, 600, 600i, 700, 700i" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form-validation.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

</head>
<body class="vertical-layout vertical-menu 1-column  menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">

    @yield('content')

    <script src="{{ asset('js/vendors.min.js') }} " type="text/javascript"></script>
    <script src="{{ asset('js/jqBootstrapValidation.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/toggle/switchery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/form-validation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app-menu.js') }} " type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }} " type="text/javascript"></script>
</body>
</html>