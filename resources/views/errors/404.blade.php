<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Fakeronline Admin | 404 Error Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="404 Not Found" name="description" />
    <meta content="Fakeronline" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    {{--<link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}
    {!! createConcat('admin/', [
        'plugins/bootstrap/css/bootstrap.min.css',
        'plugins/font-awesome/css/font-awesome.min.css',
        'css/animate.min.css', 'css/style.min.css',
    ]) !!}
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in hide"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed in">
    <!-- begin error -->
    <div class="error">
        <div class="error-code m-b-10">404 <i class="fa fa-warning"></i></div>
        <div class="error-content">
            <div class="error-message">该页面不存在！</div>
            <div class="error-desc m-b-20">
                您所访问的页面不存在。 <br />
                请重试或者返回主页。
            </div>
            <div>
                <a href="javascript:history.go(-1);" class="btn btn-success">点击返回</a>
            </div>
        </div>
    </div>
    <!-- end error -->
</div>
<!-- end page container -->

</body>
</html>
