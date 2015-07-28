<!DOCTYPE html>
<html lang="en">
<head>
    <title>LoveTeemo Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-responsive.min.css')}}" />
    {{--<link rel="stylesheet" href="{{asset('admin/css/fullcalendar.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('admin/css/unicorn.main.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/unicorn.grey.css')}}"/>
    @section('link_script')
    @show
</head>
<body>
@include('admin.widgets.header')
@include('admin.widgets.menu')
<div id="content">
    @section('main')
    @show
    @include('admin.widgets.footer')
</div>
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/unicorn.js')}}"></script>
<script src="{{asset('admin/js/unicorn.dashboard.js')}}"></script>
<script src="{{asset('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('admin/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('admin/js/excanvas.min.js')}}"></script>
@section('bodyAfter')
@show
</body>
</html>
