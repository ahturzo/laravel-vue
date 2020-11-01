<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>BlogByMaria @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/app.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/core/menu/menu-types/vertical-compact-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/pages/timeline.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/assets/css/style.css') }}">
    @yield('top-css')
</head>
<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

    <div id="app">
        @include('admin.layouts.topNav')
        @include('admin.layouts.leftSideMenu')
        <div class="app-content content">
            <div class="content-wrapper">
                @yield('breadcrumb')
                @yield('content')
                <admin-master></admin-master>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/js/scripts/customizer.min.js') }}"></script>

    @yield('bottom-js')
</body>
</html>
