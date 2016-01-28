@extends('admin.layout.base')

@section('title')文章列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">文章管理</a></li>
        <li class="active">文章列表</li>
    </ol>
@stop

@section('page-header')
    文章列表
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="{{route('admin.article.create')}}" class="btn btn-xs btn-icon btn-circle btn-primary"
                           data-click="panel-edit"><i class="fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">文章列表</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>标题</th>
                                <th>分类</th>
                                <th>标签</th>
                                <th>文章状态</th>
                                <th>发布时间</th>
                                <th>添加时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articleList as $index => $item)
                                <tr>
                                    <td><span class="badge badge-primary">{{ $index + 1}}</span></td>
                                    <td><a href="{{url('article', ['id' => $item->id])}}"
                                           target="_blank">{{$item->title}}</a></td>
                                    <td>
                                        @foreach($item->categories as $category)
                                            <a class="label" href="{{url('categoryArticle', ['id' => $category->id] )}}"
                                               target="_blank">
                                                <span class="label label-{!! getRandClass() !!}">{{ $category->name }}</span>
                                            </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($item->tags as $tag)
                                            <a class="label" href="{{ url('tagArticle',['id'=>$tag->id]) }}"
                                               title="{{ $tag->name }}"
                                               target="_blank">
                                                <span class="label label-{!! getRandClass() !!}">{{ $tag->name }}</span>
                                            </a>
                                        @endforeach
                                    </td>
                                    <td> {{$item->status ? '正常' : '隐藏'}}</td>
                                    <td> {{$item->published_at}}</td>
                                    <td> {{$item->created_at}}</td>
                                    <td style="width: 170px;;">
                                        <a href="{{route('admin.article.edit', ['id' => $item->id])}}"
                                           class="btn btn-primary btn-xs"><span class="fa  fa-edit"></span> 编辑 </a>
                                        <a href="javascript:;" data-value="{{$item->id}}" class="btn btn-danger btn-xs"
                                           data-click="article-remove"><span class="fa fa-trash-o"></span> 删除 </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate">
                            {!! $articleList->render() !!}
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
        $(document).on('click', '[data-click=article-remove]', function () {
            var id = $(this).attr("data-value");
            newAlert.show({'msg': '删除后将不可恢复，确认删除？'}, function () {
                $.ajax({
                    url: "/admin/article/" + id,
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token()}}"},
                    data: {
                        '_method': 'DELETE'
                    },
                    success: function (data) {
                        newAlert.show({msg: "删除成功!"}, function () {
                            window.location.reload();
                        });
                    },
                    error: function () {
                        newAlert.show({msg: '删除失败!'}, function () {
                            window.location.reload();
                        }, false, true);
                        return false;
                    }
                });
            }, true);
            return false;
        });
    </script>
@stop