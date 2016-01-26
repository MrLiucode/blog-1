<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <title>Faker-online</title>
    <meta name="keywords" content="Faker"/>
    <meta name="description" content="Faker">

    {!! createConcat('static/package', [
        'primer-css/css/primer.css',
        'primer-markdown/dist/user-content.min.css',
        'octicons/octicons/octicons.css',
    ]) !!}
    {!! createConcat('static/css', [
        'common.css'
    ]) !!}

    @section('css') @show

    <link rel="shortcut icon" href="{{ asset('static/images/ico/32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('static/images/ico/72.png') }}"
          type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('static/images/ico/120.png') }}"
          type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('static/images/ico/152.png') }}"
          type="image/png"/>
    <meta property="og:type" content="article">
    <meta property="og:locale" content="zh_CN"/>

    {!! createConcat('static/package', [
        'jquery/dist/jquery.min.js'
    ]) !!}

    {!! createConcat('static/js', [
        'common.js'
    ]) !!}
</head>
<body class="home">
<header class="site-header">
    <div class="container">
        <h1><a href="/">Faker Blog</a></h1>
        <nav class="site-header-nav" role="navigation">

            <a href="/" class=" site-header-nav-item" target="" title="Home">Home</a>
            @if($categoryList)
                @foreach($categoryList as $category)
                    <a href="{{url('categoryArticle/' . $category->id)}}"
                       class="site-header-nav-item">{{ $category->name }}</a>
                @endforeach
            @endif
            <form class="demo_search" action="{{url('search/keyword')}}" method="get">
                <i class="icon_search" id="open"></i>
                <input class="demo_sinput" type="text" name="keyword" id="search_input" placeholder="输入关键字 回车搜索"/>
            </form>
        </nav>


    </div>
</header>

<!-- / header -->

@yield('content')

<footer class="container">
    <div class="site-footer" role="contentinfo">
        <div class="copyright left mobile-block">
            © 2015
            <span>fakeronline.com</span>
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
{{--<script src="{{ homeAsset('/js/geopattern.js') }}"></script>--}}
{{--<script src="{{ homeAsset('/js/prism.js') }}"></script>--}}
{{--<link rel="stylesheet" href="{{ homeAsset('/css/globals/prism.css') }}">--}}

</body>
</html>
