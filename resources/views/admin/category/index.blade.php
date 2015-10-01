@extends('admin.layout.base')

@section('title')分类列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">分类管理</a></li>
        <li class="active">分类列表</li>
    </ol>
@stop

@section('page-header')
    分类列表
@stop

@section('css')
    {!! createConcat('admin/plugins/', [
        'DataTables/css/data-table.css',
    ]) !!}
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-edit"><i class="fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">分类列表</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>分类名称</th>
                                <th>描述</th>
                                <th>添加者</th>
                                <th>修改时间</th>
                                <th>添加时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge badge-primary">1</span></td>
                                    <td> laravel </td>
                                    <td> 记录有关Laravel的文章 </td>
                                    <td> admin </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td style="width: 170px;;">
                                        <button class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </button>
                                        <button class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span> 删除 </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-primary">2</span></td>
                                    <td> laravel </td>
                                    <td> 记录有关Laravel的文章 </td>
                                    <td> admin </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td style="width: 170px;;">
                                        <button class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </button>
                                        <button class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span> 删除 </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-primary">3</span></td>
                                    <td> laravel </td>
                                    <td> 记录有关Laravel的文章 </td>
                                    <td> admin </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td> 2015-0715 12:01:12 </td>
                                    <td style="width: 170px;;">
                                        <button class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </button>
                                        <button class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span> 删除 </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
        'js/dashboard-v2.min.js'
        ])
     !!}

    <script>
        App.init();
    </script>
@stop