@extends('admin.layout.base')

@section('title')分类列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">权限管理</a></li>
        <li class="active">权限组列表</li>
    </ol>
@stop

@section('page-header')
    权限组列表
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
                        <a href="{{route('admin.acl.group.create')}}" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-edit"><i class="fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限组列表</h4>
                </div>
                <div class="panel-body">
                    @include('admin.widget.message')
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>权限组名称</th>
                                <th>权限组描述</th>
                                <th>权限数量</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groupList as $index => $item)
                                <tr>
                                    <td><span class="badge badge-primary"> {{ $index + 1 }}</span></td>
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->description}} </td>
                                    <td> {{count($item->permissions)}} </td>
                                    <td style="width: 170px;;">
                                        <a href="{{route('admin.acl.group.edit', ['id' => $item->id])}}" class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </a>
                                        <a href="javascript:;" data-value="{{$item->id}}" class="btn btn-danger btn-xs" data-click="group-remove" ><span class="fa fa-trash-o"></span> 删除 </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                            {!! $groupList->render() !!}
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
    {!! createConcat('js/admin/static', [
        'plugins/DataTables/js/jquery.dataTables.js',
        'js/apps.min.js',
        ])
     !!}

    <script>
        App.init();
        $(document).on('click', '[data-click=group-remove]', function(){
            var id = $(this).attr("data-value");
            var url = "/admin/acl/group/" + id;
            var result = form_data.remove({
                'url' : url
            });
            return false;
        });
    </script>
@stop