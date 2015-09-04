<!DOCTYPE html>
<html>
<head>
    <title>Fakeronline - @section('title') @show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
    <!-- Bootstrap -->
    <link href="{{asset('admin/css/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{_package('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/animate/animate.min.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('admin/js/vendor/mmenu/css/jquery.mmenu.all.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/js/vendor/videobackground/css/jquery.videobackground.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/bootstrap-checkbox.css')}}">
    <link rel="stylesheet" href="{{asset('admin/js/vendor/chosen/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/js/vendor/chosen/css/chosen-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/minimal.css')}}">
    {{--<link rel="stylesheet" href="{{asset('admin/js/vendor/rickshaw/css/rickshaw.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('admin/js/vendor/morris/css/morris.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('admin/js/vendor/tabdrop/css/tabdrop.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('admin/js/vendor/summernote/css/summernote.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('admin/js/vendor/summernote/css/summernote-bs3.css')}}">--}}

    @section('css') @stop

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-3">


<!-- Preloader -->
<div class="mask">
    <div id="loader"></div>
</div>
<!--/Preloader -->

<!-- Wrap all page content here -->
<div id="wrap">
    <!-- Make page fluid -->
    <div class="row">
        @include('admin.widget.header')
                <!-- Page content -->
        <div id="content" class="col-md-12">

            @section('page-header') @show
            @section('main') @show

        </div>
        <!-- Page content end -->


        {{--//panel--}}
        @include('admin.widget.panel')

    </div>
    <!-- Make page fluid-->
</div>
<!-- Wrap all page content end -->
<section class="videocontent" id="video"></section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{_package('jquery/dist/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('admin/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/mmenu/js/jquery.mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/animate-numbers/jquery.animateNumbers.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/videobackground/jquery.videobackground.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/vendor/blockui/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin/js/vendor/flot/jquery.flot.selection.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/flot/jquery.flot.time.min.js')}}"></script>

<script src="{{asset('admin/js/vendor/flot/jquery.flot.animator.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/flot/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('admin/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>

<script src="{{asset('admin/js/vendor/rickshaw/raphael-min.js')}}"></script>
{{--<script src="{{asset('admin/js/vendor/rickshaw/d3.v2.js')}}"></script>--}}
<script src="{{asset('admin/js/vendor/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/morris/morris.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/tabdrop/bootstrap-tabdrop.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/summernote/summernote.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/chosen/chosen.jquery.min.js')}}"></script>
<script src="{{asset('admin/js/minimal.min.js')}}"></script>
<script src="{{asset('admin/js/common.js')}}"></script>
@section('js')
@show
</body>
</html>