<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <title>Faker-online</title>
    <meta name="keywords" content="{!! getConfig('keyword') !!}"/>
    <meta name="description" content="{!! getConfig('description') !!}">
    <meta name="author" content="{!! getConfig('author') !!}">
    <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    {!! createConcat('static/package', [
        'primer-css/css/primer.css',
        'primer-markdown/dist/user-content.min.css',
        'octicons/octicons/octicons.css',
        'nprogress/nprogress.css'
    ]) !!}
    {!! createConcat('static/css', [
        'common.css'
    ]) !!}

    @section('css') @show

    <link rel="shortcut icon" href="{{ asset('static/images/ico/32_32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="64x64" href="{{ asset('static/images/ico/64_64.png') }}"
          type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="{{ asset('static/images/ico/128_128.png') }}"
          type="image/png"/>
    <meta property="og:type" content="article">
    <meta property="og:locale" content="zh_CN"/>

    {!! createConcat('static/package', [
        'jquery/dist/jquery.min.js',
        'jquery-pjax/jquery.pjax.js',
        'nprogress/nprogress.js'
    ]) !!}

    {!! createConcat('static/js', [
        'common.js'
    ]) !!}
</head>
<body class="home">
<div id="pjax-container">
    <header class="site-header">
        <div class="container">
            <h1><a href="/">Faker Blog</a></h1>
            @include('version1_0.widget.navbar')
        </div>
    </header>

    <!-- / header -->

    @yield('content')

    <footer class="container">
        <div class="site-footer" role="contentinfo">
            <div class="copyright left mobile-block">
                {!! getConfig('copyright', '© 2015 <span>fakeronline.com</span>') !!}
                <a href="javascript:window.scrollTo(0,0)" class="right mobile-visible">TOP</a>
            </div>

            <ul class="site-footer-links right mobile-hidden">
                <li>
                    <a href="javascript:window.scrollTo(0,0)">TOP</a>
                </li>
            </ul>
            <a href="https://github.com/fakeronline" target="_blank" aria-label="view source code">
                <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
            </a>

        </div>
    </footer>

    @section('script')
    @stop
            <!-- / footer -->
</div>
</body>
</html>
