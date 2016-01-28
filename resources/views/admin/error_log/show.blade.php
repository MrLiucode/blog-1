@extends('admin.layout.base')

@section('title')系统错误日志@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="{{route('admin.errorLog.index')}}">系统错误日志</a></li>
        <li class="active">错误日志明细</li>
    </ol>
@stop

@section('page-header')
    错误日志明细
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
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="m-t-10"> {{$errorLog->type}} <small> {{$errorLog->http_method}} / <a
                                            href="{{$errorLog->request_url}}" target="_blank">{{$errorLog->request_url}}</a> </small> </h3>
                        </div>
                        <!-- begin col-6 -->
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#default-tab-1" data-toggle="tab">消息</a></li>
                                <li class=""><a href="#default-tab-2" data-toggle="tab">请求</a></li>
                                <li class=""><a href="#default-tab-3" data-toggle="tab">用户信息</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="default-tab-1">
                                    <h3 class="m-t-10"> {{$errorLog->message}} </h3><hr>
                                    <p>{!! handelTraceString($errorLog->trace_message) !!}</p>
                                </div>
                                <div class="tab-pane fade" id="default-tab-2">

                                    <div class="row">
                                        <span class="col-md-1 tx-r"><h4>URL:</h4></span>
                                        <div class="col-md-8">
                                            <pre> <a href="{{$errorLog->request_url}}" target="_blank">{{$errorLog->request_url}}</a> </pre>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span class="col-md-1 tx-r"><h4>请求方式:</h4></span>
                                        <div class="col-md-8">
                                            <pre> {{$errorLog->http_method}}</pre>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span class="col-md-1 tx-r"><h4>IP地址:</h4></span>
                                        <div class="col-md-8">
                                            <pre> {{$errorLog->ip}}</pre>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span class="col-md-1 tx-r"><h4>浏览器标识:</h4></span>
                                        <div class="col-md-8">
                                            <pre> {{$errorLog->user_agent}}</pre>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span class="col-md-1 tx-r"> <h4>headers头:</h4> </span>
                                        <div class="col-md-8">
                                            <pre>
                                                {!! print_r(json_decode($errorLog->headers, true)) !!}
                                            </pre>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="default-tab-3">
                                    <div class="row">
                                        <span class="col-md-1 tx-r"> <h4>用户邮箱:</h4> </span>
                                        <span class="col-md-1 tx-r"> <h5>{{$errorLog->user->email ?: '未知用户' }}</h5> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@stop

@section('js')
    {!! createConcat('admin', [
        'plugins/DataTables/js/jquery.dataTables.js',
        'js/apps.min.js',
        ])
     !!}

    <script>
        App.init();
    </script>
@stop