<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fakeronline - @section('title')首页@show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="菜鸟不会飞~">
    @section('meta')
    @show
    <!-- Bootstrap Core CSS -->
    <link href="{{_package('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{_package('sb-admin-2/css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="{{_package('sb-admin-2/css/plugins/timeline.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{_package('sb-admin-2/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{_package('sb-admin-2/css/plugins/morris.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{_package('sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{_package('html5shiv/dist/html5shiv.min.js')}}"></script>
    <script src="{{_package('respondJs/dest/respond.min.js')}}"></script>
    <![endif]-->
    @section('link')
        @show

    <style>
        .pdl0{padding-left: 0px;}
        .pdr0{padding-right: 0px;}
        .pdt0{padding-top: 0px;}
        .pdb0{padding-bottom: 0px; }
        .pd0{padding: 0px;}
        .ml0{margin-left: 0px;}
        .mr0{margin-right: 0px;}
        .mt0{margin-top: 0px;}
        .mb0{margin-bottom: 0px;}
        .mn0{margin: 0px;}
        .mn10{margin:10px;}
        .mn20{margin: 20px;}
        .text-center{text-align: center;}
        .text-right{text-align: right;}
        .text-left{text-align: left;}
        .lh30{line-height: 30px;}

        .form-horizontal .control-group {
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #eeeeee;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
@section('bodyBefore')
    @show
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.widgets.header')
            @include('admin.widgets.nav')
            @include('admin.widgets.menu')
        </nav>

        <div id="page-wrapper">
            @section('main')
                @show
        </div>
    </div>

    <script src="{{_package('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{_package('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{_package('sb-admin-2/js/plugins/metisMenu/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{_package('sb-admin-2/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('admin/js/common.js')}}"></script>
@section('bodyAfter')
    @show
</body>
</html>