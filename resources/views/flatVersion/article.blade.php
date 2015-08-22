@extends('flatVersion.public.layout')

@section('main')
    <link rel="stylesheet" href="{{_package('editor.md/css/editormd.min.css')}}">
    <link rel="stylesheet" href="{{_package('editor.md/lib/codemirror/lib/codemirror.css')}}">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">首页</a></li>
        <li class="active">文章类型</li>
        <li class="active">PHP</li>
    </ol>
    <div class="col-md-12 row-l articles">
        <h3>{{$article->title}}</h3>
        <div class="a-write">时间：&nbsp;{{$article->created_at}}  11:24&nbsp;&nbsp;作者：<a>{{$article->author}}</a>&nbsp;&nbsp;阅读：（{{$article->click_num}}）</div>
        <div class="a-content">
            {!! htmlspecialchars_decode($article->content_html) !!}
        </div>
        <div class="a-write hidden-xs">发表自：&nbsp;Win 8.1&nbsp;&nbsp;地址：北京市北京市&nbsp;&nbsp;评论：&nbsp;1&nbsp;&nbsp;关键词：&nbsp;ThinkPHP&nbsp;&nbsp;</div>
        <br /><br />
    </div>
@stop