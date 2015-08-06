@extends('admin.base')

@section('main')

<div id="content-header">
    <h1>{{isset($data) ? '修改' : '添加'}}分类</h1>
</div>
<div id="breadcrumb">
    <a href="{{url('/')}}" title="回到后台首页" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="{{route('admin.category.index')}}" class="tip-bottom">分类管理</a>
    <a href="#" class="current">{{isset($data) ? '修改' : '添加'}}分类</a>
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
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon  icon-align-left"></i></span>
                    <h5>{{isset($data) ? '修改' : '添加'}}分类</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="{{isset($data) ? route('admin.category.update', ['id' => $data['id']]) : route('admin.category.store')}}" class="form-horizontal" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if(isset($data))
                            <input type="hidden" name="_method" value="PUT">
                            {{--<input type="hidden" name="id" value="{{$data['id']}}">--}}
                        @endif
                        <div class="control-group">
                            <label class="control-label">分类名称：</label>
                            <div class="controls">
                                <input type="text" name="name" value="{{isset($data) ? array_get($data, 'name', '') : ''}}" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">分类描述</label>
                            <div class="controls">
                                <textarea name="remark">{{isset($data) ? array_get($data, 'remark', '') : ''}}</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">排序：</label>
                            <div class="controls">
                                <input type="number" name="sort" value="{{isset($data) ? array_get($data, 'sort', 100) : 100}}" min="100" max="1000" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">打开方式</label>
                            <div class="controls">
                                <label>
                                    <input type="radio" name="target" value="1" {{(isset($data) && empty(array_get($data, 'target', 0))) || (!isset($data)) ? 'checked' : ''}} /> 新窗口
                                </label>
                                <label>
                                    <input type="radio" name="target" value="0" {{isset($data) && empty(array_get($data, 'target', 0)) ? 'checked' : ''}}/> 原窗口</label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                {{isset($data) ? '更新' : '添加'}}分类
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop