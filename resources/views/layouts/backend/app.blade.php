<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{ secure_asset('assets/frontend/images/fev-icon.ico') }}">

        <!-- Google Fonts -->
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet">

        <!-- Bootstrap Core Css -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{ secure_asset('assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{ secure_asset('assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="{{ secure_asset('assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="{{ secure_asset('assets/backend/css/style.css') }}" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{ secure_asset('assets/backend/css/theme-black.min.css') }}" rel="stylesheet" />

        <!-- Css for toastr -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

        <!-- JQuery DataTable Css -->
        <link rel="stylesheet"
              href="{{ secure_asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

        @stack('css')

    </head>
    <body class="theme-black">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

       <!-- Top Bar -->
       @include('layouts.backend.partial.topbar')
       <!-- #Top Bar -->

       <!-- Left Sidebar -->
       @include('layouts.backend.partial.sidebar')
       <!-- #END# Left Sidebar -->

        <!-- Content area -->
        <section class="content">
            @yield('content')
        </section>
        <!-- #END# Content area -->

        <!-- Jquery Core Js -->
        <script src="{{ secure_asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ secure_asset('assets/plugins/bootstrap/js/bootstrap.min.js')  }}"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="{{ secure_asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{ secure_asset('assets/plugins/node-waves/waves.js') }}"></script>

        @stack('js')

        <!-- Jquery DataTable Plugin Js -->
        <script src="{{ secure_asset('assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
        <script src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
        <script src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}">
        </script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}">
        </script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}">
        </script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}">
        </script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}">
        </script>
        <script
            src="{{ secure_asset('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}">
        </script>

        <!-- Custom Js -->
        <script src="{{ secure_asset('assets/backend/js/admin.js') }}"></script>

        <!-- FileHelper Js -->
        <script src="{{ secure_asset('assets/backend/js/helpers.js') }}"></script>

        <!-- Sweete alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- Toastr Js -->
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

    </body>
</html>
