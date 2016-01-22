<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Fakeronline Admin | @section('title')后台管理系统@show</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport"/>
    <meta content="Fakeronline" name="description"/>
    <meta content="Fakeronline" name="author"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    {{--<link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}
    {!! createConcat('static/package', [
        'jquery-ui/themes/base/jquery-ui.min.css',
        'bootstrap/dist/css/bootstrap.min.css',
        'font-awesome/css/font-awesome.min.css',
        'icheck/skins/flat/blue.css', //ICheck
    ]) !!}
    {!! createConcat('static/css/admin', [
        'animate.min.css',  'style.min.css', 'style-responsive.min.css', 'black.css',
    ]) !!}
            <!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    @section('css')
    @show
            <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <!-- ================== BEGIN BASE JS ================== -->

    {!! createConcat('static/package', [
        'pace/pace.min.js', 'jquery/dist/jquery.min.js', 'icheck/icheck.min.js'
    ]) !!}
    {!! createConcat('static/js/admin', [
        'common.js'
    ]) !!}
    <script>
        $(function(){
            //设置AJAX header头
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>

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
{{--{!! createConcat('static/package/js', [--}}
    {{--''--}}
{{--]) !!}--}}

{!! createConcat('static/package', [
    'jquery-migrate/jquery-migrate.min.js',
    'jquery-ui/jquery-ui.min.js',
    'bootstrap/dist/js/bootstrap.min.js',
    'jquery-slimscroll/jquery.slimscroll.min.js',
    'jquery-cookie/jquery.cookie.js',
]) !!}
<!--[if lt IE 9]>
{!! createConcat('static/package', [
    'html5shiv/dist/html5shiv.js',
    'respond/dist/respond.min.js',
    'excanvas/excanvas.js'
]) !!}
<![endif]-->
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! createConcat('static/js/admin', [
    'apps.min.js',
    'dashboard-v2.min.js'
]) !!}

@section('js')
    <script>
        $(document).ready(function () {
            App.init();
            DashboardV2.init();
        });
    </script>
@show

</body>
</html>
