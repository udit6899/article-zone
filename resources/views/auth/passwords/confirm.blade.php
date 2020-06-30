<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Confirm Password</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ secure_asset('assets/frontend/images/fev-icon.ico') }}">

    <script src="{{ secure_asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <link href="{{ secure_asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">

        body {
            margin-top: 10%;
            background-color: whitesmoke;
        }
        .separator {
            border-right: 1px solid #dfdfe0;
        }
        .icon-btn-save {
            padding-top: 0;
            padding-bottom: 0;
        }
        .input-group {
            margin-bottom:10px;
        }
        .btn-save-label {
            position: relative;
            left: -12px;
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0,0,0,0.15);
            border-radius: 3px 0 0 3px;
        }
    </style>
</head>
    <body >

        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-th"></span>
                                Confirm password
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 separator social-login-box"> <br>
                                    <img alt="" class="img-thumbnail" src="{{ Auth::user()->imageUrl }}">
                                </div>
                                <div style="margin-top:30px;" class="col-xs-12 col-sm-6 col-md-6 login-box">
                                    <div class="text-center">
                                        <p>Please confirm your password before continuing the operation.</p>
                                    </div>
                                    <div class="form-group" style="margin-top: 50px">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                            <input class="form-control" id="password" name="password" type="password"
                                               placeholder="Enter Password" autocomplete="current-password" required />
                                            <br>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                                    <button class="btn icon-btn-save btn-success" type="submit">
                                            <span class="btn-save-label">
                                                <i class="glyphicon glyphicon-log-in"></i>
                                            </span>
                                        <strong>Confirm</strong>
                                    </button>
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                                        <a class="btn icon-btn-save btn-warning" href="{{ route('password.request') }}">
                                            <span class="btn-save-label">
                                                <i class="glyphicon glyphicon-compressed"></i>
                                            </span>
                                            <strong>Forget</strong>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{ secure_asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ secure_asset('assets/plugins/bootstrap/js/bootstrap.min.js')  }}"></script>

    </body>
</html>
