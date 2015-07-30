<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{array_get($optionList, 'website_title', '')}}@section('title')@show</title>
    <meta name="keywords" content="{{array_get($optionList, 'website_keyword', '')}}" />
    <meta name="description" content="{{array_get($optionList, 'website_description', '')}}" />
    <meta name="author" content="{{array_get($optionList, 'website_author', '')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{_package('bootswatch/cyborg/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{_asset('css/common.css')}}">

    @section('meta')
    @show
    @section('headLink')
    @show
</head>
<body>
@include('default.widgets.header')
<div class="container">
    @section('main')
    @show
</div>

@include('default.widgets.footer')
<script src="{{_package('jquery/dist/jquery.min.js')}}"></script>
<script src="{{_package('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{_asset('js/common.js')}}"></script>
@section('bodyAfter')
@show
</body>
</html>
