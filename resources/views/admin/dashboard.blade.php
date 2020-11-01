@extends('admin.layouts.master')
@section('top-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/vendors/css/extensions/unslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/vendors/css/weather-icons/climacons.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/plugins/calendars/clndr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/core/colors/palette-climacon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('robust/app-assets/css/pages/users.min.css') }}">

@endsection
@section('breadcrumb')
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Add Course</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Course</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection

@section('bottom-js')

    <script src="{{ asset('robust/app-assets/vendors/js/extensions/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/chartist.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/extensions/underscore-min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/extensions/clndr.min.js') }}"></script>
    <script src="{{ asset('robust/app-assets/vendors/js/extensions/unslider-min.js') }}"></script>

    <script src="{{ asset('robust/app-assets/js/scripts/pages/dashboard-project.min.js') }}"></script>
@endsection
