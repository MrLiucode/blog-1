<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> - @section('title')@show</title>
    <meta name="keywords" content="{$keyword}" />
    <meta name="description" content="{$description}" />
    <meta name="version" content="{$foot['name']}  {$foot.version}" />
    <meta name="author" content="{$author}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{_package('bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{_asset('css/my.css')}}">
    @section('meta')
    @show
    @section('headLink')
    @show
</head>
    @section('bodyBefore')
        @show
    <body>
        <div class="top">
            <div class="container">
                <div class="col-md-6">
                    <div class="top-l">系统：<a class="from">{$Os}</a></div>
                </div>
                <div class="col-md-6">
                    <div class="top-r">
                        <if condition="$qqname eq '' ">
                            <a class='from' href="{:U('C/index')}">腾讯QQ</a>
                            <else />   {$qqname} <a class='from' href="{:U('C/out')}">退出</a>
                        </if>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="active item"><img src="{{_asset('img/s1.jpg')}}"/></div>
                        <div class="item"><img src="{{_asset('img/s2.jpg')}}"/></div>
                        <div class="item"><img src="{{_asset('img/s3.jpg')}}"/></div>
                    </div>
                </div>
            </div>
            <div class="row aerousel">
                <div class="col-md-8 row-l">
                    <h4>最新文章</h4>
                    <hr />
                    <volist name="articles" id="v" empty="暂时没有文章">
                        <article>
                            <h4><a href="{:U('/article-'.$v['a_id'])}">{$v.a_title}</a></h4>
                            <div class="post-summary">
                                <div class="clearfix" >
                                    <p class="remark"> <a href="{:U('/article-'.$v['a_id'])}"><img src="__PUBLIC__/Img/s2.jpg" class="thumbnail img-180" alt="S" title="{$v.a_title}"  /></a>{$v.a_remark}<a href="{:U('/article-'.$v['a_id'])}" class="btn btn-primary look-all" role="button">查看全部</a>
                                    </p>
                                    <p class="write hidden-sm">
                                        <a><span class="glyphicon glyphicon-time"></span></a>&nbsp;{$v.a_time|date="m/d H:i",###}&nbsp;&nbsp;作者：&nbsp;&nbsp;{$v.a_writer}&nbsp;&nbsp;分类：&nbsp;&nbsp;[&nbsp;{$v.t_name}&nbsp;]
                                    </p>
                                </div>
                            </div>
                        </article>
                        <hr>
                    </volist>
                </div>
                <div class="col-md-4 row-r">
                    <h4>我的标签</h4>
                    <hr />
                    <ul class="tag-ul">
                        <volist name="tag" id="v" empty="暂时没有标签">
                            <if condition="$v['id'] % 6 ==1">
                                <li class="label label-default"><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                            <if condition="$v['id'] % 6 ==2">
                                <li class="label label-primary "><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                            <if condition="$v['id'] % 6 ==3">
                                <li class="label label-success "><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                            <if condition="$v['id'] % 6 ==4">
                                <li class="label label-info "><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                            <if condition="$v['id'] % 6 ==5">
                                <li class="label label-warning "><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                            <if condition="$v['id'] % 6 ==0">
                                <li class="label label-danger "><a href="{:U('/article-'.$v['a_id'])}">{$v.a_keyword}</a></li>
                            </if>
                        </volist>
                    </ul>
                    <h4> 随机文章</h4><hr>
                    <ul class="rand-ul">
                        <volist name="s_article" id="vo" empty="暂时没有文章">
                            <li><a>
                                    <img src="__PUBLIC__/Img/s2.jpg" class="thumbnail  img-80" alt="" title="" /></a>
                                <div class="rand-title">
                                    <a href="{:U('/article-'.$vo['a_id'])}">{$vo.a_title|strip_tags|mb_substr=0,18,'utf-8'}..</a>
                                </div>
                                <div class="rand-remark">
                                    {$vo.a_remark|strip_tags|mb_substr=0,35,'utf-8'}..
                                </div>
                            </li>
                        </volist>
                    </ul>
                    <h4>最新互动</h4>
                    <hr>
                    <div class="tab"  id="tab">
                        <ul class="nav nav-tabs" >
                            <li class="active"><a href="#home" data-toggle="tab">最新评论</a></li>
                            <li><a href="#content" data-toggle="tab">最新留言</a></li>
                            <li><a href="#hot" data-toggle="tab">最多点击</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <ul class="content-ul">
                                <volist name="s_content" id="vo" empty="暂时没有评论">
                                    <if condition="$vo.a_c_id neq 0 ">
                                        <li>
                                            <if condition="$vo.a_c_url neq '' ">
                                                <a href="{$vo.a_c_url}" target="_blank" rel="nofollow" title="浏览 {$vo.a_c_name} 的网站？"></a>
                                            </if>
                                            <img src="/Public/Img/Portrait/{$vo.a_c_img}.jpg" class="img-circle img-45"/>
                                            <div class="content-name">
                                                <a><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;</a>{$vo.a_c_name}
                                            </div>
                                            <div class="content-remark">
                                                <span class="label label-success ">文章</span>&nbsp;&nbsp;<a href="{:U('/article-'.$vo['a_id'])}" title="{$vo.a_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}.." >{$vo.a_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}..</a>
                                            </div>
                                        </li>
                                        <elseif condition="$vo.al_c_id neq 0"/>
                                        <li>
                                            <if condition="$vo.al_c_url neq '' ">
                                                <a href="{$vo.al_c_url}" target="_blank" rel="nofollow" title="浏览 {$vo.al_c_name} 的网站？"></a>
                                            </if>
                                            <img src="/Public/Img/Portrait/{$vo.al_c_img}.jpg" class="img-circle img-45"/>
                                            <div class="content-name">
                                                <a><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;</a>{$vo.al_c_name}</div>
                                            <div class="content-remark">
                                                <span class="label label-primary ">相册</span>&nbsp;&nbsp;<a href="{:U('/album-'.$vo['al_id'])}" title="{$vo.al_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}.." >{$vo.al_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}..</a>
                                            </div>
                                        </li>
                                        <elseif condition="$vo.s_c_id neq 0"/>
                                        <li>
                                            <if condition="$vo.s_c_url neq '' ">
                                                <a href="{$vo.s_c_url}" target="_blank" rel="nofollow" title="浏览 {$vo.s_c_name} 的网站？"></a>
                                            </if>
                                            <img src="/Public/Img/Portrait/{$vo.s_c_img}.jpg" class="img-circle img-45"/>
                                            <div class="content-name">
                                                <a><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;</a>{$vo.s_c_name}</div>
                                            <div class="content-remark">
                                                <span class="label label-info ">说说</span>&nbsp;&nbsp;<a href="{:U('/feel-'.$vo['s_id'])}" title="{$vo.s_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}.." >{$vo.s_c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}..</a>
                                            </div>

                                        </li>
                                    </if>
                                </volist>
                            </ul>
                        </div>
                        <div class="tab-pane " id="content">
                            <ul class="content-ul">
                                <volist name="contents" id="v" empty="暂时没有留言">
                                    <li>
                                        <if condition="$v.c_url neq '' ">
                                            <a href="{$v.c_url}" target="_blank" rel="nofollow" title="浏览 {$v.c_name} 的网站？"></a>
                                        </if>
                                        <img src="/Public/Img/Portrait/{$v.c_img}.jpg" class="img-circle img-45"/>
                                        <div class="content-name">
                                            <a><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;</a>{$v.c_name}
                                        </div>
                                        <div class="content-remark">
                                            <a href="{:U('/gustbook')}" title="{$v.c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}.." >{$v.c_content|delFace|strip_tags|mb_substr=0,20,'utf-8'}..</a>
                                        </div>
                                    </li>
                                </volist>
                            </ul>
                        </div>
                        <div class="tab-pane " id="hot">
                            <ul class="hot-ul">
                                <volist name="hits" id="v">
                                    <li><a><span class="glyphicon glyphicon-leaf"></span></a>&nbsp;&nbsp;<a  href="{:U('/article-'.$v['a_id'])}" >{$v.a_title}</a>({$v.a_hit})</li>
                                </volist>
                            </ul>
                        </div>
                    </div>
                    <h4 class="link">友情链接</h4>
                    <hr>
                    <ul class="link-ul">
                        <volist name="links" id="v" empty="暂时没有友情链接">
                            <li><a href="http://{$v.l_url}" target="_blank" title="{$v.l_name}">{$v.l_name}</a></li>
                        </volist>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-footer">
            <div class="container footer">
                <div class="row">
                    <div class="col-md-3 hidden-xs">
                        <h4>程序统计</h4>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-comment"></span></a>&nbsp;&nbsp;微说：&nbsp;{$box1.saids} 条
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;文章：&nbsp;{$box1.articles} 篇
                                    </span>
                        </p>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-envelope"></span></a>&nbsp;&nbsp;评论：&nbsp;{$box1.num} 条
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-send"></span></a>&nbsp;&nbsp;留言：&nbsp;{$box1.content} 条
                                    </span>
                        </p>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-home"></span></a>&nbsp;&nbsp;建站：&nbsp;{$box1.time} 天
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-camera"></span></a>&nbsp;&nbsp;相册：&nbsp;{$box1.albums} 个
                                    </span>
                        </p>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-picture"></span></a>&nbsp;&nbsp;图片：&nbsp;{$box1.picture} 天
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-link"></span></a>&nbsp;&nbsp;链接：&nbsp;{$box1.link} 条
                                    </span>
                        </p>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-usd"></span></a>&nbsp;&nbsp;收入：&nbsp;￥{$box1.pay}RMB
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-tree-conifer"></span></a>&nbsp;&nbsp;访问：&nbsp;{$box1.hit} 次
                                    </span>
                        </p>
                    </div>
                    <div class="col-md-3 ">
                        <h4>程序交流</h4>
                        <p class="foot-box1">
                            <a><span class="glyphicon glyphicon-user"></span></a>
                            &nbsp;群：<a href="http://jq.qq.com/?_wv=1027&k=dSjBgy" target="_blank" class="foot-my"><strong>455466010</strong></a>
                                    <span class="foot-box1-r">
                                    <a><span class="glyphicon glyphicon-heart-empty"></span></a>
                                    &nbsp;<a href="http://koubei.baidu.com/w/loveteemo.com" target="_blank" class="foot-my">&nbsp;邀你点评</a>
                                    </span>
                        </p>
                        <p class="foot-box1">
                            程序：&nbsp;{$foot.name}
                                    <span class="foot-box1-r">
                                    版本：&nbsp;{$foot.version}
                                    </span>
                        </p>
                        <p class="foot-box1">
                            框架：&nbsp;{$foot.frame}
                                    <span class="foot-box1-r">
                                    语言：&nbsp;{$foot.lang}
                                    </span>
                        </p>
                        <p class="foot-box1">
                            编码：&nbsp;{$foot.charset}
                                    <span class="foot-box1-r">
                                    作者：&nbsp;{$foot.author}
                                    </span>
                        </p>
                        <p class="foot-box1">
                            源码协议：&nbsp;请参考&nbsp;&nbsp;<a href="#" class="foot-my">FAQ</a>
                        </p>
                    </div>
                    <div class="col-md-3 hidden-xs">
                        <h4>推荐文章</h4>
                        <volist name="f_article" id="vo">
                            <p class="foot-box3"><a><span class="glyphicon glyphicon-pushpin"></span></a>&nbsp;&nbsp;<a href="{:U('/article-'.$vo['a_id'])}" title="{$vo.a_title}" class="foot-my">{$vo.a_title}</a></p>
                        </volist>
                    </div>
                    <div class="col-md-3 hidden-xs">
                        <h4>我的相册</h4>
                        <ul class="picture-ul">
                            <volist name="album" id="vo">
                                <li>
                                    <a href="{:U('/album-'.$vo['al_id'])}" target="_blank"><img class="img-rounded img-50" src=".{$vo.al_url}" alt="{$vo.al_name}"></a>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </div>
                <div class="row bottom">
                    <div class="col-md-6 col-sm-5 bottom-left">
                        {$copy_l}
                    </div>
                    <div class="col-md-6 col-sm-7 bottom-right hidden-xs">
                        {$copy_r}
                    </div>
                </div>
            </div>
        </div>
    </body>
    @section('bodyAfter')
        @show
</html>
