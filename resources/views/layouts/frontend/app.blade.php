<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!--========================== Bootstrap css ==========================-->
        <link href="{{ secure_asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--========================== font-awesome css ==========================-->
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!--========================== google-font css ==========================-->
        <link rel='stylesheet'
              href="{{ asset('assets/frontend/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!--========================== style css ==========================-->
        <link href="{{ secure_asset('assets/frontend/css/style.css') }}" rel="stylesheet">
        <!--============================ fevicon ===============================-->
        <link rel="shortcut icon" type="image/png" href="{{ secure_asset('assets/frontend/images/fev-icon.ico') }}">
        <!--========================== responsive css ==========================-->
        <link href="{{ secure_asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

        @stack('css')

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="index-one">
        <!--========================== preloader ==========================-->
        <div id="preloader"></div>

        <!--========================== include header ==========================-->
        @include('layouts.frontend.partial.header')
        <!--========================== content ==========================-->
        @yield('content')
        <!--========================== include footer ==========================-->
        @include('layouts.frontend.partial.footer')

        <!--========================== Main jQuery ==========================-->
        <script src="{{ secure_asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!--============================== Bootstrap js ================================-->
        <script src="{{ secure_asset('assets/plugins/bootstrap/js/bootstrap.min.js')  }}"></script>
        <!--============================== Custom js ================================-->
        <script src="{{ secure_asset('assets/plugins/jquery-sticky/jquery.sticky.js') }}"></script>
        <script src="{{ secure_asset('assets/frontend/js/custom.js') }}"></script>

        <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

        <!-- Error message -->
        <script>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}', 'Error', { closeButton: true, progressBar: true });
                @endforeach
            @endif

            @if (session('status'))
                toastr.success('{{ session('status') }}', 'Success', { closeButton: true, progressBar: true });
            @endif

        </script>

        @stack('js')
    </body>
</html>
