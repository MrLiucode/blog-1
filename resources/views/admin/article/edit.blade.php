@extends('admin.layout.base')
@section('title')
{{isset($article) ? '添加' : '编辑'}}文章
@stop
@section('page-header')
<!-- page header -->
<div class="pageheader">
    <h2><i class="fa fa-tachometer"></i> 文章列表 </h2>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li>当前位置</li>
            <li><a href="{{url()}}">首页</a></li>
            <li><a href="{{route('admin.article.index')}}">文章列表</a></li>
            <li class="active">{{isset($article) ? '添加' : '编辑'}}文章</li>
        </ol>
    </div>


</div>
<!-- /page header -->
@stop

@section('main')
<div class="row">
    <div class="col-sm-12">
        <!-- tile -->
        <section class="tile color transparent-black">
            <!-- tile header -->
            <div class="tile-header">
                <h1><strong>Basic</strong> Validations</h1>
                <div class="controls">
                    <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                    <a href="#" class="remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- /tile header -->

            <!-- tile body -->
            <div class="tile-body">

                <form class="form-horizontal" role="form" parsley-validate id="basicvalidations">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">文章标题 *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">文章分类 *</label>
                        <div class="col-sm-10" id="selectbox">
                            <select name="category" class="chosen-select chosen-transparent form-control" id="category" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
                                <option value="">请选择文章分类</option>
                                <option value="11">Laravel</option>
                                <option value="222">PHP</option>
                                <option value="33">Java</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章内容 *</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#input-wrapper" aria-controls="home" role="tab" data-toggle="tab">内容</a></li>
                                    <li role="presentation"><a href="#output-wrapper" aria-controls="home" role="tab" data-toggle="tab">预览</a></li>
                                </ul>
                                <div id="editor">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="input-wrapper">
                                            <div id="content" style="height:400px"></div>
                                            <textArea name="content" placeholder="请用Markdown语法">阿萨德发送到分</textArea>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="output-wrapper">
                                            <div id="output"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email *</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password *</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passwordconfirm" class="col-sm-2 control-label">Password Confirm *</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="passwordconfirm" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website" class="col-sm-2 control-label">Website</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="website" parsley-trigger="change" parsley-minlength="4" parsley-type="url" parsley-validation-minlength="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthdate" class="col-sm-2 control-label">Birthdate</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="birthdate" parsley-trigger="change" parsley-minlength="4" parsley-type="dateIso" parsley-validation-minlength="1" placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input05" class="col-sm-2 control-label">Message (20 chars min, 200 max)</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="input05" rows="3" parsley-trigger="keyup" parsley-rangelength="[20,200]" parsley-validation-minlength="1"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input07" class="col-sm-2 control-label">Normal select box *</label>
                        <div class="col-sm-10" id="selectbox">
                            <select class="chosen-select chosen-transparent form-control" id="input07" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
                                <option value="">Please choose</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input08" class="col-sm-2 control-label">Multiple select box *</label>
                        <div class="col-sm-10" id="selectbox2">
                            <select multiple class="chosen-select chosen-transparent form-control" id="input08" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2">
                                <option value="11">1</option>
                                <option value="222">2</option>
                                <option value="33">3</option>
                                <option value="44">4</option>
                                <option value="55">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Check at least 2 checkboxes *</label>
                        <div class="col-sm-10" id="myproperlabel">
                            <div class="checkbox check-transparent">
                                <input type="checkbox" value="1" id="opt01" parsley-group="mygroup" parsley-trigger="change" parsley-required="true" parsley-mincheck="2" parsley-error-container="#myproperlabel .last">
                                <label for="opt01">Option 1</label>
                            </div>
                            <div class="checkbox check-transparent">
                                <input type="checkbox" value="1" id="opt02" parsley-group="mygroup" parsley-trigger="change" parsley-required="true" parsley-mincheck="2" parsley-error-container="#myproperlabel .last">
                                <label for="opt02">Option 2</label>
                            </div>
                            <div class="checkbox check-transparent last">
                                <input type="checkbox" value="1" id="opt03" parsley-group="mygroup" parsley-trigger="change" parsley-required="true" parsley-mincheck="2" parsley-error-container="#myproperlabel .last">
                                <label for="opt03">Option 3</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /tile body -->




        </section>
        <!-- /tile -->
    </div>
</div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('admin/css/prism.css')}}">
    <style type="text/css">
        #editor {
            border:1px solid #ddd;
            border-top:0;
        }
        textarea, #editor #input, #editor #output {
            height: 400px;
            width: 100%;
            vertical-align: top;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 8px 10px;
            font-family: 'Monaco', courier, monospace;

        }
        #output {
            overflow: auto;
        }
        textarea {
            resize: none;
            outline: none;
            background-color: #fff;
            font-size: 14px;
            font-family: 'Monaco', courier, monospace;
            padding: 20px;
            border:1px solid #eee;
        }
        .tab-pane {
            padding:10px;
        }
    </style>
@stop
@section('js')
    <script src="{{asset('admin/js/prism.js')}}"></script>
    <script src="{{asset('admin/js/vendor/parsley/parsley.min.js')}}"></script>

    <script src="{{ _package('ace-builds//src-min/ace.js') }}"></script>
    <script src="{{ _package('ace-builds//src-min/theme-github.js') }}"></script>
    <script src="{{ _package('ace-builds//src-min/mode-php.js') }}"></script>
    <script src="{{ _package('ace-builds//src-min/ext-language_tools.js') }}"></script>
    <script src="{{ _package('ace-builds//src-min/snippets/php.js') }}"></script>
    <script type="text/javascript" src="{{ _package('marked/marked.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/trick-new-edit.min.js') }}"></script>
    {{--<script>--}}
        {{--ace.require("ace/ext/language_tools");--}}
        {{--var editor = ace.edit("content");--}}
        {{--var textarea = $('#input').hide();--}}
        {{--var preview = $('#output');--}}
        {{--var phpMode = ace.require("ace/mode/php").Mode;--}}

        {{--editor.setTheme("ace/theme/github");--}}
        {{--editor.getSession().setMode(new phpMode());--}}
        {{--editor.getSession().setValue(textarea.val());--}}
        {{--editor.setOptions({--}}
            {{--enableBasicAutocompletion: true,--}}
            {{--enableSnippets: true,--}}
            {{--enableLiveAutocompletion: false--}}
        {{--});--}}
    {{--</script>--}}
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/twilight");
        editor.getSession().setMode("ace/mode/javascript");
    </script>
@stop