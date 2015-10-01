<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Fakeronline Admin | @section('title')后台管理系统@show</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport"/>
    <meta content="Fakeronline" name="description"/>
    <meta content="Fakeronline" name="author"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    {!! createConcat('admin/plugins', [
        'jquery-ui/themes/base/minified/jquery-ui.min.css',
        'bootstrap/css/bootstrap.min.css',
        'font-awesome/css/font-awesome.min.css'
    ]) !!}
    {!! createConcat('admin/css', [
        'animate.min.css',  'style.min.css', 'style-responsive.min.css', 'theme/black.css',
    ]) !!}
            <!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    @section('css')
    {{--{!! createConcat('admin/plugins/', [--}}
    {{--'jquery-jvectormap/jquery-jvectormap-1.2.2.css',--}}
    {{--'bootstrap-calendar/css/bootstrap_calendar.css',--}}
    {{--'assets/plugins/gritter/css/jquery.gritter.css',--}}
    {{--'morris/morris.css'--}}
    {{--]) !!}--}}
    @show
            <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <!-- ================== BEGIN BASE JS ================== -->
    {!! createConcat('admin/', [
        'plugins/pace/pace.min.js', 'plugins/jquery/jquery-1.9.1.min.js', 'js/common.js'
    ]) !!}

    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in">
    <span class="spinner"></span>
</div>
<!-- end #page-loader -->
<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    @include('admin.widget.header')
    <!-- end #header -->
    <!-- begin #sidebar -->
    @include('admin.widget.sidebar')
            <!-- end #sidebar -->
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        @section('breadcrumb') @show
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">
            @section('page-header') @show
        </h1>
        <!-- end page-header -->
        <!-- begin row -->
        @section('content') @show
    </div>
    <!-- end #content -->
    <!-- begin theme-panel -->
    @include('admin.widget.panel')
    <!-- end theme-panel -->
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
       data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->
<!-- ================== BEGIN BASE JS ================== -->
{!! createConcat('admin/plugins/', [
    'jquery/jquery-migrate-1.1.0.min.js',
    'jquery-ui/ui/minified/jquery-ui.min.js',
    'bootstrap/js/bootstrap.min.js'
]) !!}
<!--[if lt IE 9]>
{!! createConcat('admin/crossbrowserjs/', [
'html5shiv.js', 'respond.min.js', 'excanvas.min.js'
]) !!}
<![endif]-->
{!! createConcat('admin', [
    'plugins/slimscroll/jquery.slimscroll.min.js',
    'plugins/jquery-cookie/jquery.cookie.js'
]) !!}
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! createConcat('admin', [
    'js/apps.min.js',
    'js/dashboard-v2.min.js'
]) !!}

@section('js')
    <script>
        $(document).ready(function () {
            App.init();
            DashboardV2.init();
        });
    </script>
@show

{{--<script src="assets/plugins/morris/raphael.min.js"></script>--}}

{{--<script src="assets/plugins/morris/morris.js"></script>--}}

{{--<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}

{{--<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>--}}

{{--<script src="assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>--}}

{{--<script src="assets/plugins/gritter/js/jquery.gritter.js"></script>--}}

{{--<script src="assets/js/dashboard-v2.min.js"></script>--}}

{{--<script src="assets/js/apps.min.js"></script>--}}

 <!-- ================== END PAGE LEVEL JS ================== -->

</body>
</html>
