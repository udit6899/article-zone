<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">

        <link rel="shortcut icon" type="image/png" href="{{ secure_asset('assets/frontend/images/fev-icon.ico') }}">

        <!-- Custom css -->
        <link href="{{ asset('assets/frontend/css/error/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-bg">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <h1>oops!</h1>
                <h2>Error @yield('code') : @yield('message')</h2>
                <a href="{{ url('/') }}">go to home</a>
            </div>
        </div>
    </body>
</html>
