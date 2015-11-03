<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Fakeronline | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Fakeronline" name="description" />
    <meta content="Fakeronline" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    {!! createConcat('admin/plugins', [
        'jquery-ui/themes/base/minified/jquery-ui.min.css',
        'bootstrap/css/bootstrap.min.css',
        'font-awesome/css/font-awesome.min.css'
    ]) !!}
    {!! createConcat('admin/css', [
        'animate.min.css',  'style.min.css', 'style-responsive.min.css', 'theme/default.css',
    ]) !!}
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><img src="{{asset('admin/img/login-bg/bg-1.jpg')}}" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated flipInX">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span><img class="img-circle" src="{{asset('logo.ico')}}" alt=""></span> Fakeronline Admin
                <small>后台管理系统</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            {!! Form::open(['url' =>  url('auth/login'), 'method' => 'POST', 'class' => 'margin-bottom-0']) !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger fade in m-b-15">
                    <strong>登录失败：</strong>
                    用户名或密码错误！
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            @endif
            <div class="form-group m-b-20">
                {!! Form::input('email', 'email', old('email'), ['placeholder' => '用户名', 'class' => 'form-control input-lg']) !!}
            </div>
            <div class="form-group m-b-20">
                {!! Form::input('password', 'password', null, ['class' => 'form-control input-lg', 'placeholder' => '密码']) !!}
            </div>
            <div class="checkbox m-b-20">
                <label>
                    {!! Form::checkbox('remember') !!}记住我
                </label>
            </div>
            <div class="login-buttons">
                {!! Form::button('确认登录', ['type' => 'submit', 'class' => 'btn btn-success btn-block btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- end login -->

    <ul class="login-bg-list">
        <li class="active"><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-1.jpg') ) !!} </a></li>
        <li><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-2.jpg') ) !!} </a></li>
        <li><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-3.jpg') ) !!} </a></li>
        <li><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-4.jpg') ) !!} </a></li>
        <li><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-5.jpg') ) !!} </a></li>
        <li><a href="#" data-click="change-bg"> {!! Form::image( asset('admin/img/login-bg/bg-6.jpg') ) !!} </a></li>
    </ul>
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
{!! createConcat('admin/plugins/', [
    'jquery/jquery-1.9.1.min.js',
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
    'plugins/jquery-cookie/jquery.cookie.js',
    'js/login-v2.demo.min.js',
    'js/apps.min.js'
]) !!}

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>

</body>
</html>
