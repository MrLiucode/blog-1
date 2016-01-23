<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <base href="blog.com">
    <title>Fakeronline blog</title>
    {!! createConcat('static/package/Bootflat', [
        'css/bootstrap.min.css', 'bootflat/css/bootflat.min.css', 'css/site.min.css'
    ]) !!}
    {!! createConcat('static/css', [
        'common.css'
    ]) !!}
    {!! createConcat('static/', [
        'package/Bootflat/js/jquery-1.10.1.min.js', 'js/common.js'
    ]) !!}
    @section('css') @show
</head>

<body>

@include('flat.layout.header')

@section('container')
@show

@include('flat.layout.footer')
{!! createConcat('static/package/Bootflat', [
    'js/bootstrap.min.js', 'bootflat/js/icheck.min.js',
    'bootflat/js/jquery.fs.selecter.min.js',
    'bootflat/js/jquery.fs.stepper.min.js'
]) !!}

@section('js') @show

</body>
</html>