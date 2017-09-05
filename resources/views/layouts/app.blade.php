<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>双星信息管理系统 - ERP.info</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <top username="{{ Auth::user()->name }}"></top>
        <slide class="slide" style="display: inline-block;float: left;"></slide>
        <div class="main" >
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>

<style>
    .el-menu {
        border-radius: 0px;
    }

    .slide {
        width: 200px;
        height: 914px;
    }

    .logo-home {
        margin-left: 20px;
    }
</style>

