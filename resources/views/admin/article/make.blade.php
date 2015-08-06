@section('link_script')
    <link rel="stylesheet" href="{{_package('select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{_package('bootstrap-tokenfield/dist/css/tokenfield-typeahead.min.css')}}">
    <link rel="stylesheet" href="{{_package('bootstrap-tokenfield/dist/css/bootstrap-tokenfield.min.css')}}">
    <link rel="stylesheet" href="{{_package('editor.md/css/editormd.min.css')}}">
    <link rel="stylesheet" href="{{_package('editor.md/lib/codemirror/lib/codemirror.css')}}">
    <style>
        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555;
            vertical-align: middle;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
    </style>
@stop
@extends('admin.base')

@section('main')
    <div id="content-header">
        <h1>{{isset($data) ? '修改' : '发表'}}文章</h1>
    </div>
    <div id="breadcrumb">
        <a href="{:U('User/Index/index')}" title="回到后台首页" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="tip-bottom">文章列表</a>
        <a href="#" class="current">{{isset($data) ? '修改' : '发表'}}文章</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @include('admin.widgets.error')
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class=" icon-pencil"></i></span>
                        <h5>{{isset($data) ? '修改' : '发表'}}文章</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" action="{{isset($data) ? route('admin.article.update', ['id' => array_get($data, 'id')]) : route('admin.article.store')}}" method="post" onsubmit="return form_submit();">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(isset($data))
                                <input type="hidden" name="id" value="{{array_get($data, 'id', 0)}}">
                                <input type="hidden" name="_method" value="put">
                            @endif
                            <div class="control-group">
                                <label class="control-label">文章标题</label>
                                <div class="controls">
                                    <input type="text" placeholder="文章标题" name="title" value="{{isset($data) ? array_get($data, 'title', '') : ''}}"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >文章类型</label>
                                <div class="controls" >
                                    <select name="type">
                                        @foreach($category as $item)
                                            <option value="{{array_get($item, 'id', 0)}}" {{isset($data) && array_get($data, 'type', '') == array_get($item, 'id', '') ? 'selected' : ''}} />{{array_get($item, 'name', '')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">标签</label>
                                <div class="controls">
                                    <input type="text" id="tokenfield" name="tag" value="{{isset($articleTags) ? $articleTags : ''}}"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">文章正文</label>
                                <div id="test-editormd"></div>
                                <textArea name="content" style="display: none;"></textArea>
                                <textArea name="content_html" style="display: none;"></textArea>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="">摘要</label>
                                <div class="controls">
                                    <textArea name="description" placeholder="默认自动提取您文章的前200字显示在博客首页作为文章摘要，您也可以在这里自行编辑">{{isset($data) ? array_get($data, 'description', '') : ''}}</textArea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">是否置顶</label>
                                <div class="controls">
                                    <label><input type="radio" name="status" value="1" {{!isset($data) ? 'checked' : ''}} {{isset($data) && $data['status'] == 1 ? 'checked' : '' }} />是 </label>
                                    <label><input type="radio" name="status" value="0"  {{isset($data) && $data['status'] == 0 ? 'checked' : '' }}/> 否</label>
                                    <label><input type="radio" name="status" value="-1" {{isset($data) && $data['status'] == -1 ? 'checked' : '' }} /> 隐藏</label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">作者：</label>
                                <div class="controls">
                                    <input type="text" name="author" value="{{isset($data) ? $data['author'] : ''}}"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">{{isset($data) ? '修改' : '发表'}}文章</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="markdown-content" style="display: none;">{{isset($data) ? array_get($data, 'content', '') : ''}}</div>
@stop

@section('bodyAfter')
    <script src="{{_package('select2/dist/js/select2.min.js')}}"></script>
    <script src="{{_package('bootstrap-tokenfield/dist/bootstrap-tokenfield.js')}}"></script>
    <script src="{{_package('editor.md/editormd.min.js')}}"></script>
    <script>
        alert('123123');
        $('select').select2();
//        $('#tokenfield').tokenfield({
//            showAutocompleteOnFocus: true
//        });
        var editor = editormd("test-editormd", {
            width   : "90%",
            height  : 640,
//            theme : "dark",
//            previewTheme : "dark",
//            editorTheme : "pastel-on-dark",
            codeFold : true,
            syncScrolling : "single",
            path : "{{_package('editor.md/lib')}}/",
            placeholder : '文章内容',
            emoji : true,
            taskList : true,
            tocm : true,         // Using [TOCM]
            tex : true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart : true,             // 开启流程图支持，默认关闭
            sequenceDiagram : true,
            markdown : $("#markdown-content").text(),
            onload : function() {
                console.log('onload', this);
                //this.fullscreen();
                //this.unwatch();
                //this.watch().fullscreen();

                //this.setMarkdown("#PHP");
                //this.width("100%");
                //this.height(480);
                //this.resize("100%", 640);
            }
        });
        function form_submit(){
            $("textArea[name='content_html']").val(editor.getPreviewedHTML());
            $("textArea[name='content']").val(editor.getMarkdown());
            return true;
        }
    </script>
@stop
