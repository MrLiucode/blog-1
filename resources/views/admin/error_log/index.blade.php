@extends('admin.layout.base')

@section('title')系统错误日志@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">系统错误日志</a></li>
        <li class="active">错误日志列表</li>
    </ol>
@stop

@section('page-header')
    错误日志列表
    @stop


    @section('content')
            <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">错误日志列表</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>错误消息</th>
                                <th>错误类型</th>
                                <th>链接地址</th>
                                <th width="80px;">请求方式</th>
                                <th width="80px;">严重级别</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($errorLogList as $index => $item)
                            <tr>
                                <td><span class="badge badge-primary">{{$index + 1}}</span></td>
                                <td> <a class="u-block" href="{{route('admin.errorLog.show', ['id' => $item->id])}}" target="_blank"><strong>{{$item->message}}</strong>  [<small>{{$item->type}}</small>]
                                    <br /> <small>触发时间: {!! $item->created_at->diffForHumans() !!}</small> </a> </td>
                                <td> {{$item->type}} </td>
                                <td><a class="u-block" href="{{$item->request_url}}" target="_blank">{{$item->request_url}}</a></td>
                                <td> {{$item->http_method}} </td>
                                <td style="width: 170px;;">
                                    {!! $item->severity ? '<span class="badge badge-danger">错误</span>' : '<span class="badge badge-warning">警告</span>' !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                            {!! $errorLogList->render() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@stop

@section('js')
    <script>
        App.init();
    </script>
@stop