@extends('default.layouts.base')

@section('main')
    <div class="row articles">
        <div class="col-lg-8 row-l pdl0">
            <ol class="breadcrumb">
                <li><a href="index.html">网站首页</a></li>
                <li class="active">学海无涯&nbsp;|&nbsp;生活随笔</li>
            </ol>
            <div class="well bs-component">
                <h3>ThinkPHP正则路由分享</h3>
                <div class="a-write">时间：&nbsp;2015-07-12  11:24&nbsp;&nbsp;作者：<a>隆航</a>&nbsp;&nbsp;阅读：（16）</div>
                <div class="a-content">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tooltip on left">Tooltip on left</button>
                    <a href="#" data-toggle="tooltip" title="Example tooltip">请悬停在我的上面</a>
                    <script>$(function () { $("[data-toggle='tooltip']").tooltip(); });</script>
                    {{-- todo::content --}}内容区域<br /><br /><br /><br /><br />
                </div>
                <div class="a-write hidden-xs">
                    发表自：&nbsp;Win 8.1&nbsp;&nbsp;地址：北京市北京市&nbsp;&nbsp;评论：&nbsp;1&nbsp;&nbsp;关键词：&nbsp;ThinkPHP&nbsp;&nbsp;
                </div>
                <div class="bdsharebuttonbox bdshare-button-style1-24 share" data-bd-bind="1437823877506"><a class="bds_more" href="#" data-cmd="more"></a><a title="分享到QQ空间" class="bds_qzone" href="#" data-cmd="qzone"></a><a title="分享到腾讯微博" class="bds_tqq" href="#" data-cmd="tqq"></a><a title="分享到微信" class="bds_weixin" href="#" data-cmd="weixin"></a><a title="分享到百度贴吧" class="bds_tieba" href="#" data-cmd="tieba"></a><a title="分享到百度云收藏" class="bds_bdysc" href="#" data-cmd="bdysc"></a><a title="分享到QQ好友" class="bds_sqq" href="#" data-cmd="sqq"></a></div>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"Fakeronline的分享","bdMini":"2","bdMiniList":false,"bdPic":"{{_asset('images/logo.png')}}","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                <div class="a-up">
                    <p>上一篇：<a title="PHP小技巧之&amp;&amp;" href="/article-19.html">PHP小技巧之&amp;&amp;</a> </p>
                </div>
                <div class="a-down">
                    <p>下一篇：<a title="人生在于总结-大二" href="/article-21.html">人生在于总结-大二</a>  </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 visible-lg pdr0">
            @include('default.widgets.right')
        </div>
    </div>
@stop
