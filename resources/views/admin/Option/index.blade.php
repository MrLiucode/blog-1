@extends('admin.base')

@section('main')

    <div id="content-header">
        <h1>系统基本设置</h1>
    </div>
    <div id="breadcrumb">
        <a href="{:U('User/Index/index')}" title="回到后台首页" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="tip-bottom">系统设置</a>
        <a href="#" class="current">基本设置</a>
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

                @if(Session::has('success'))
                        <div class="alert alert-info">
                            <span class="icon-hand-right"></span> 更新成功!
                            <a href="#" data-dismiss="alert" class="close">×</a>
                        </div>
                @endif
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class=" icon-pencil"></i></span>
                        <h5>系统基本设置</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('system.base.option.update')}}" method="post" class="form-horizontal" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label">网站标题：</label>
                            <div class="controls">
                                <input type="text" name="website_title" value="{{array_get($optionList, 'website_title', '')}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">网站关键字：</label>
                            <div class="controls">
                                <input type="text" name="website_keyword" value="{{array_get($optionList, 'website_keyword', '')}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">网站描述：</label>
                            <div class="controls">
                                <textArea name="website_description">{{array_get($optionList, 'website_description', '')}}</textArea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">网站作者：</label>
                            <div class="controls">
                                <input type="text" name="website_author" value="{{array_get($optionList, 'website_author', '')}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">座右铭：</label>
                            <div class="controls">
                                <textArea name="website_motto">{{array_get($optionList, 'website_motto', '')}}</textArea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">ICP：</label>
                            <div class="controls">
                                <input type="text" name="website_icp" value="{{array_get($optionList, 'website_icp', '')}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">版权：</label>
                            <div class="controls">
                                <input type="text" name="website_copy" value="{{array_get($optionList, 'website_copy', '')}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">底部代码：</label>
                            <div class="controls">
                                <textArea name="website_footer">{{array_get($optionList, 'website_footer', '')}}</textArea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">确认修改</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop