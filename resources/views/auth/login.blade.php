<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>登录 - ERP.info</title>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row" style="margin-top: 110px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="logo-login">
                    <i class="iconfont" style="color: #20a0ff;font-size: 100px;">&#xe6ae;</i>
                </div>
                <div class="panel panel-default" style="margin-top: 30px;">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body" style="margin-top: 10px;">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label" style="margin-top: -3px;">
                                    <i class="iconfont" style="font-size: 18px;color: #959FAF;">&#xe600;</i>
                                </label>

                                <div class="col-md-5">
                                    <input id="email" type="email" class="form-control"
                                           placeholder="输入管理员邮箱" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label" style="margin-top: -3px;">
                                    <i class="iconfont" style="font-size: 18px;color: #959FAF;">&#xe637;</i>
                                </label>

                                <div class="col-md-5">
                                    <input id="password" type="password" class="form-control"
                                           placeholder="密码不少于6位" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住密码
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-login-login">
                                        登录
                                    </button>

                                    <a class="btn btn-link" href="#">
                                        忘记密码?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <footer>
                    <div class="footer-info">
                        <p>&copy; 2017 ERP.info &middot;
                            <i class="iconfont" style="font-size: 20px;color: #959FAF;">&#xe609;</i>
                            <span>大头东</span> &middot;
                            <i class="iconfont" style="font-size: 16px;color: #959FAF;">&#xe6e8;</i>
                            <span>小浒 &middot; 大头东</span>
                        </p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

<script>

</script>

<style>
    .logo-login {
        text-align: center;
    }

    .form-horizontal input {
        box-shadow: none!important;
    }

    .form-horizontal input:focus {
        box-shadow: none!important;
    }

    .btn.btn-primary.btn-login-login {
        border: none;
        width: 78px;
    }

    .footer-info {
        color: #959FAF;
    }


</style>


