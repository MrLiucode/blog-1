@extends('admin.layout.base')

@section('title')系统管理@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">系统管理</a></li>
        <li class="active">{{isset($tag) ? '修改' : '添加'}}友情链接</li>
    </ol>
    @stop

    @section('page-header')
    {{--<h1 class="page-header"> {{isset($article) ? '修改' : '添加'}}文章 <small> </small></h1>--}}
    @stop

    @section('css')
    <style>
        #permission-list .icheckbox_flat-blue{
            margin-top: 0;
        }
    </style>
    @stop

    @section('content')
            <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-4">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">友情链接表单</h4>
                </div>
                <div class="panel-body">
                    @include('admin.widget.message')
                    @if(isset($friendship))
                        {!! Form::model($friendship, ['url' => route('admin.friendship.update', ['id' => $friendship->id]), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        @include('admin.friendship.form')
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['url' => route('admin.friendship.store'), 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('admin.friendship.form')
                        {!! Form::close() !!}
                    @endif
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