@section('hack_header')
@show
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    @section('meta')
    @show
    <title>{{array_get($optionList, 'website_title', '')}}@section('title')@show</title>
    <meta name="keywords" content="{{array_get($optionList, 'website_keyword', '')}}" />
    <meta name="description" content="{{array_get($optionList, 'website_description', '')}}" />
    <meta name="author" content="{{array_get($optionList, 'website_author', '')}}" />
    <link rel="stylesheet" href="{{_package('Bootflat/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{_package('Bootflat/bootflat/css/bootflat.min.css')}}">
    <link rel="stylesheet" href="{{_package('Bootflat/css/site.min.css')}}">
    <link rel="stylesheet" href="{{_asset('css/common.css')}}">
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
                        <a  href="####"><span class="label {{tagColor()}}">{{$item['name']}}</span></a>
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
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32" src="{{_asset('images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32" src="{{_asset('images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32" src="{{_asset('images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32" src="{{_asset('images/hd_pic.jpg')}}"></a>
                        <div class="media-body">
                            <h3 class="media-heading">PHP问题纠正</h3>
                            <p>12 Apr, 2013 at 12:00</p>
                            <p>如果可以再多爱一点，我可以去屎.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object img-rounded head-pic-32" src="{{_asset('images/hd_pic.jpg')}}"></a>
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
<script src="{{_package('Bootflat/js/jquery-1.10.1.min.js')}}"></script>
<script src="{{_package('Bootflat/js/bootstrap.min.js')}}"></script>

<!-- Bootflat's JS files.-->
<script src="{{_package('Bootflat/bootflat/js/icheck.min.js')}}"></script>
<script src="{{_package('Bootflat/bootflat/js/jquery.fs.selecter.min.js')}}"></script>
<script src="{{_package('Bootflat/bootflat/js/jquery.fs.stepper.min.js')}}"></script>

<scirpt src="{{_asset('js/common.js')}}"></scirpt>
@section('bodyAfter')
@show
</body>
</html>