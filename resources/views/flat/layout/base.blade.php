@section('hack_header')
@show
        <!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    @section('meta')
    @show
    <title>首页@section('title')@show</title>
    <meta name="keywords" content="Fakeronline"/>
    <meta name="description" content="Fakeronline"/>
    <meta name="author" content="Fakeronline"/>
    {!! createConcat('static/package/bootflat', [
        'bootstrap/bootstrap.min.css', 'css/bootflat.css'
    ]) !!}
    {!! createConcat('static/css', [
        'common.css'
    ]) !!}
    {!! createConcat('static/package/bootflat/js', [
        'jquery-1.10.1.min.js'
    ]) !!}
    @section('link')
    @show
</head>

<body>
@section('bodyBefore')
@show
@include('flatVersion.public.header')
<div class="main container">
    <div class="col-lg-8">
        @section('main')
        @show
    </div>
    <div class="main-left col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="glyphicon glyphicon-fire"></span>热门文章</h4>
            </div>
            <div class="panel-body rounded-list">
                <ol>
                    @foreach($hotArticle as $item)
                        <li><a href="###">{{$item->title}}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="panel-footer">
                <a href="###">查看更多</a>
            </div>

        </div>

        <div class="panel">

            <div class="panel-heading">
                <h4 class="panel-title"><span class="glyphicon glyphicon-fire"></span>热门标签</h4>
            </div>
            <div class="panel-body">
                <div class="tag">
                    @foreach($hotTagList as $item)
                        <a href="####"><span class="label {!! getRandClass() !!} ">{{$item['name']}}</span></a>
                    @endforeach
                    @if(empty($hotTagList))
                        暂没有任何标签
                    @endif
                    &nbsp;
                </div>
            </div>
        </div>

        <div class="panel">

            <div class="panel-heading">
                <h4 class="panel-title"><span class="glyphicon glyphicon-thumbs-up"></span>推荐文章</h4>
            </div>
            <div class="panel-body rounded-list">
                <ol>
                    @foreach($goodArticle as $item)
                        <li><a href="###">{{$item->title}}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="panel-footer">
                <a href="###">查看更多</a>
            </div>
        </div>

        <div class="panel">

            <div class="panel-heading">
                <h4 class="panel-title"><span class="glyphicon glyphicon-comment"></span>最新评论</h4>
            </div>
            <div class="panel-body">
                <ul class="media-list">
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32"
                                                           src="{{asset('static/images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32"
                                                           src="{{asset('static/images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32"
                                                           src="{{asset('static/images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32"
                                                           src="{{asset('static/images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32"
                                                           src="{{asset('static/images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="###">查看更多</a>
            </div>
        </div>
    </div>
</div>
@include('flatVersion.public.footer')
        <!-- Bootstrap -->
{!! createConcat('static/package/bootflat/js', [
    'bootstrap.min.js', 'jquery.icheck.js'
]) !!}

        <!--[if IE 8]>
{!! createConcat('static/package/bootflat/js', [
    'respond.min.js', 'html5shiv.js'
]) !!}
        <!--[if !IE]><!-->
{!! createConcat('static/js', [
    'common.js'
]) !!}
@section('bodyAfter')
@show
</body>
</html>