@extends('admin.base')

@section('main')

<div id="content-header">
    <h1>文章列表</h1>
    <div class="btn-group">
        <a class="btn btn-large tip-bottom" title="发布新文章" href="{{route('admin.article.create')}}"><i class="icon-file"></i></a>
    </div>
</div>
<div id="breadcrumb">
    <a href="{{url('/')}}" title="回到后台首页" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="#" class="tip-bottom">内容管理</a>
    <a href="#" class="current">文章列表</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            @include('admin.widgets.error')
            @include('admin.widgets.success')
            <div class="widget-box">
                <div class="widget-title">
                    <h5>文章详情</h5>
                    <span class="label label-important">已有{{$articleList->total()}}篇文章</span>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th width="5%" >编号</th>
                            <th width="50%">标题</th>
                            <th width="15%">发表时间</th>
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        @foreach($articleList as $index => $item )
                            <tbody>
                            <tr class="gradeX">
                                <td><span class="badge">{{$index + 1}}</span></td>
                                <td>
                                    {{$item->title}}
                                </td>
                                <td>
                                    {!! $item->created_at !!}
                                </td>
                                <td class="center">
                                    <form action="{{route('admin.article.destroy', ['id' => $item->id])}}" method="POST" onsubmit="return confirm('是否删除此条记录')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{route('admin.article.edit', ['id' => $item->id])}}"><button type="button" class="btn btn-primary"><i class="icon-pencil icon-white"></i> 编辑</button></a>
                                    <button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i> 删除</button>
                                        </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="pull-right">
                    {!! $articleList->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop