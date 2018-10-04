<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Masuk</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/4.5.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="https://gianyar907.com">SISTEMASI <b>NPWP</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input value="{{ old('username') }}" required="required" type="username" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="help-block text-red">{{ $errors->first('username') }}</span>
                </div>
                <div class="form-group has-feedback">
                    <input value="{{ old('password') }}" required="required" type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input @if(old('remember')) checked="checked" @endif name="remember" value="1" type="checkbox"> Ingat saya
                                <input type="hidden" name="submit" value="1">
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                </div>
            </form>
        </div><br>
        <div>
        <strong>Copyright &copy; {{ date('Y') == 2018 ? 2018 : '2018-'.date('Y') }} <a href="https://gianyar907.com/">{{ config('app.name') }}</a>.</strong> All rights reserved | Developer by <strong><a href="https://bangsamediabali.com/">Bangsa Media Bali</a></strong> - <strong>CEKOTECHNETWORK.</strong>
	    </div>
	
    </div>
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>
</html>
