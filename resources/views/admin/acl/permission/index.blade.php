@extends('admin.layout.base')

@section('title')分类列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">权限管理</a></li>
        <li class="active">权限列表</li>
    </ol>
@stop

@section('page-header')
    权限列表
@stop

@section('css')
    {!! createConcat('admin/plugins/', [
        'DataTables/css/data-table.css',
        'ladda/ladda-themeless.min.css'
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限列表</h4>
                </div>
                <div class="panel-body">
                    @include('admin.widget.message')
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>权限标识</th>
                                <th>权限描述</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissionList as $index => $item)
                                <tr>
                                    <td><span class="badge badge-primary"> {{ $index + 1 }}</span></td>
                                    <td> {{$item->ident}} </td>
                                    <td> {{ $item->description }} </td>
                                    <td style="width: 170px;;">
                                        <a data-click="permission-edit" data-url="{{route('admin.acl.permission.edit', ['id' => $item->id])}}" href="javascript:;" class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </a>
                                        <a href="javascript:;" data-value="{{$item->id}}" class="btn btn-danger btn-xs" data-click="permission-remove" ><span class="fa fa-trash-o"></span> 删除 </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                            {!! $permissionList->render() !!}
                        </div>

                    </div>
                </div>
            </div>

            @if($undistributedRouteList)
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="{{route('admin.category.create')}}" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-edit"><i class="fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">未分配列表</h4>
                </div>
                <div class="panel-body">
                    @include('admin.widget.message')
                    <div class="row">
                        @foreach($undistributedRouteList as $value)
                        <div class="col-md-3 radio">
                            <label>
                                {!! Form::radio('routeAlias', $value) !!} {{$value}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <hr />
                    {!! Form::open(['url' => route('admin.acl.permission.store'), 'data-parsley-validate' => 'true', 'method' => 'POST' ]) !!}
                    <fieldset>
                        <legend>生成权限</legend>
                        <div class="form-group">
                            {!! Form::label('ident', '权限标识') !!}
                            {!! Form::input('text', 'ident', '', ['class' => 'form-control', 'placeholder' => '权限标识', 'required' => 'true', 'readonly' => 'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', '权限描述') !!}
                            {!! Form::input('text', 'description', '', ['class' => 'form-control', 'placeholder' => '权限描述', 'required' => 'true']) !!}
                        </div>
                        {!! Form::button('一键生成全部权限', ['type' => 'button', 'class' => 'btn btn-sm btn-success m-r-5']) !!}
                        {!! Form::button('生成权限', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary m-r-5']) !!}
                        <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
            @endif
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- modal-dialog -->
    <div class="modal fade" id="form-permission-edit" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">编辑权限</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('ident', '权限标识') !!}
                        {!! Form::input('text', 'ident', '', ['class' => 'form-control', 'placeholder' => '权限标识', 'required' => 'true', 'readonly' => 'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', '权限描述') !!}
                        {!! Form::input('text', 'description', '', ['class' => 'form-control', 'placeholder' => '权限描述', 'required' => 'true']) !!}
                    </div>
                    {!! Form::input('hidden', 'id', '') !!}
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                    <button type="button" class="btn btn-sm btn-warning ladda-button" data-click="permission-save" data-style="zoom-in"><span class="ladda-label">保存</span></button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    {!! createConcat('admin', [
        'plugins/DataTables/js/jquery.dataTables.js',
        'js/apps.min.js',
        'js/dashboard-v2.min.js',
        'plugins/ladda/spin.min.js',
        'plugins/ladda/ladda.min.js'
        ])
     !!}

    <script>
        App.init();
        var updateUrl = "{{url('admin/acl/permission/')}}";
        var loader;
        $(document).on('change', '[name=routeAlias]', function(e){
            e.preventDefault();
            $("input[name=ident]").val($(this).val());
        }).on('click', '[data-click=permission-remove]', function(e){
            e.preventDefault();
            form_data.remove({
                'url' : "/admin/acl/permission/" + $(this).attr('data-value')
            });
            return false;
        }).on('click', '[data-click=permission-edit]', function(e){
            e.preventDefault();
            var url = $(this).attr("data-url");
            var result = form_data.ajaxGet(url);
            if(!result.status){
                newAlert.show({'msg' : '获取数据出错!' , 'header' : '无法编辑'}, false, false, true);
            }
            var data = result.data;
            $("#form-permission-edit input[name=ident]").val(data.ident);
            $("#form-permission-edit input[name=description]").val(data.description);
            $("#form-permission-edit input[name=id]").val(data.id);
            $('#form-permission-edit').modal();
        }).on('click', '[data-click=permission-save]', function(e){
            e.preventDefault();
            loader = Ladda.create( document.querySelector('[data-click=permission-save]') );
            loader.start();
            setTimeout(updatePermission, 500);
        });

        function updatePermission(){
            var permissionId = $("#form-permission-edit input[name=id]").val();
            var url = updateUrl + '/' + permissionId;
            var result = form_data.ajaxGet(url, 'PUT', {
                'ident' : $("#form-permission-edit input[name=ident]").val(),
                'description' : $("#form-permission-edit input[name=description]").val()
            });
            loader.stop();
            $('#form-permission-edit').modal('hide');
            if(!result.status){
                newAlert.show({'msg' : '获取数据出错!' , 'header' : '无法编辑'}, false, false, true);
                return false;
            }
            newAlert.show({'msg' : '更新成功!'}, function(){
                var interval =  setTimeout(function(){
                    window.location.reload();
                }, 500);
            });
        }
    </script>
@stop