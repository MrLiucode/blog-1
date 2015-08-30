<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    @section('meta') @show
    <title>Fakeronline后台管理 - @section('title')首页@show</title>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('admin/css/framework.css')}}" />--}}
    <link rel="stylesheet" href="{{_package('semantic/dist/semantic.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/main.css')}}" />
    @section('css')
    @show
</head>
<body>
<div class="page">
    <!--header begin-->
    @include('admin.layout.header')
    <!-- the main menu-->
    @include('admin.layout.nav')
    <!--the main content begin-->
    <div class="ui container">
        <!--the content-->
        <div class="ui grid">
            <!--the vertical menu-->
            @include('admin.layout.menu')
            <!--the newDevice form-->
            @section('main')
            @show
        </div>
    </div>
</div>
<!--footer begin-->
@include('admin.layout.footer')
<script type="text/javascript" src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{_package('semantic/dist/semantic.min.js')}}"></script>
<script>
    $('.ui.dropdown').dropdown();
</script>
@section('js')
@show
</body>
</html>
