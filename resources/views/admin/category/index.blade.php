@extends('admin.base')

@section('main')

    <div id="content-header">
        <h1>文章分类</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="增加新分类" href="{{route('admin.category.create')}}"><i class="icon-file"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="{{url('admin/index')}}" title="回到后台首页" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="tip-bottom">分类管理</a>
        <a href="#" class="current">分类列表</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-error">
                            <span class="icon-hand-right"></span> {{ $error }}
                            <a href="#" data-dismiss="alert" class="close">×</a>
                        </div>
                    @endforeach
                @endif
                @if(Session::has('message'))
                        <div class="alert alert-info">
                            {{Session::pull('message')}}
                        </div>
                @endif
                <div class="widget-box">
                    <div class="widget-title">
                        <h5>分类详情</h5>
                        <span class="label label-important">已有{{$list->total()}}个分类</span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th width="4%">编号</th>
                                <th width="15%">分类名称</th>
                                <th width="15%">分类描述</th>
                                <th width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $index => $item)
                            <tr class="gradeX">
                                <td text-align="center"><span class="badge">{{$index + 1}}</span></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->remark}}</td>
                                <td class="center">
                                    <form action="{{route('admin.category.destroy', ['id' => $item->id])}}" method="POST" onsubmit="return confirm('是否删除此条记录')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{action('Admin\CategoryController@edit', ['id' => $item->id])}}">
                                        <button type="button" class="btn btn-primary"><i class="icon-pencil icon-white"></i> 编辑</button>
                                    </a>
                                        <button type="submit" class="btn btn-danger"><i class="icon-remove icon-white"></i> 删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if(empty($list))
                            <tr class="gradeX">
                                <td colspan="30">
                                    <div class="alert alert-info">
                                        暂无任何分类
                                    </div>
                                </td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                        {!! $list->render() !!}
                    </div>

                    {{--{$page}--}}
                </div>
            </div>
        </div>
    </div>
@stop