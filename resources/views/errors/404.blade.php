<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>404 - ERP.info</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row" style="margin-top: 300px">
                <div class="col-md-12">
                    <div class="404-div" style="text-align: center;">
                        <img src="http://ot4aplrlt.bkt.clouddn.com/404.png" width="260px">
                        <p style="margin-top: 30px;">你要访问的页面或数据不存在</p>
                        <a class="btn btn-primary btn-sm" href="JavaScript:window.history.go(-1)" style="border: none;">返回上页</a>
                        <a class="btn btn-primary" href="/home" style="border: none;background: none;color: #20A0FF;">前往首页</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>