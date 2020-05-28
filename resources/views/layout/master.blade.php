<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!--========================== Bootstrap css ==========================-->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!--========================== font-awesome css ==========================-->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <!--========================== google-font css ==========================-->
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!--========================== style css ==========================-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!--============================ fevicon ===============================-->
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/fev-icon.ico') }}">
        <!--========================== responsive css ==========================-->
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="index-one">
        <!--========================== preloader ==========================-->
        <div id="preloader"></div>

        <!--========================== include header ==========================-->
        @include('assets.header')
        <!--========================== content ==========================-->
        @yield('content')
        <!--========================== include footer ==========================-->
        @include('assets.footer')

        <!--========================== Main jQuery ==========================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--============================== Bootstrap js ================================-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!--============================== Custom js ================================-->
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/instafeed.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <!--============================== Active js ================================-->
        <script src="{{ asset('js/active.js') }}"></script>
    </body>
</html>












