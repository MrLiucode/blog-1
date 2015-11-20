@extends('admin.layout.base')

@section('title')文章列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">权限管理</a></li>
        <li class="active">用户列表</li>
    </ol>
@stop

@section('page-header')
    用户列表
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
                        <a href="{{route('admin.acl.user.create')}}" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-edit"><i class="fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">用户列表<</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>昵称</th>
                                <th>邮箱</th>
                                <th>手机号</th>
                                <th>职位</th>
                                <th>所在权限组</th>
                                <th>最后登录IP</th>
                                <th>当前状态</th>
                                <th>更新时间</th>
                                <th>添加时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userList as $index => $item)
                            <tr>
                                <td><span class="badge badge-primary">{{$index + 1}}</span></td>
                                <td> {{$item->name}} </td>
                                <td> {{$item->email}} </td>
                                <td> {{$item->userInfo->mobile or '无'}} </td>
                                <td> {{$item->userInfo->position or '无'}} </td>
                                <td> @if(!$item->groups) 未分配权限组 @endif @foreach($item->groups as $groupItem) {{$groupItem->name}} &nbsp;&nbsp;&nbsp;&nbsp; @endforeach</td>
                                <td>{{ $item->login_ip ? long2ip($item->login_ip) : '无登录记录'}}</td>
                                <td> {{array_get($statusMap, $item->status, '未知状态')}} </td>
                                <td> {{$item->updated_at}}</td>
                                <td> {{$item->created_at}}</td>
                                <td style="width: 170px;;">
                                    <a href="{{route('admin.acl.user.edit', ['id' => $item->id])}}" class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </a>
                                    <a href="javascript:;" data-value="{{$item->id}}" class="btn btn-danger btn-xs" data-click="user-remove" ><span class="fa fa-trash-o"></span> 删除 </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                            {!! $userList->render() !!}
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
    {!! createConcat('admin', [
        'plugins/DataTables/js/jquery.dataTables.js',
        'js/apps.min.js',
        'js/dashboard-v2.min.js'
        ])
     !!}

    <script>
        App.init();
        $(document).on('click', '[data-click=user-remove]', function(){
            var id = $(this).attr("data-value");
            var url = "/admin/acl/user/" + id;
            var result = form_data.remove({
                'url' : url
            });
            return false;
        });

    </script>
@stop