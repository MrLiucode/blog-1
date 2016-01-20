@extends('admin.layout.base')

@section('title')文章列表@stop

@section('breadcrumb')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">首页</a></li>
        <li><a href="javascript:;">文章管理</a></li>
        <li class="active">{{isset($article) ? '修改' : '添加'}}文章</li>
    </ol>
@stop

@section('page-header')
    {{--<h1 class="page-header"> {{isset($article) ? '修改' : '添加'}}文章 <small> </small></h1>--}}
@stop

    @section('css')
    {!! createConcat('static/package', [
        'datatables/media/css/jquery.dataTables.min.css',
        'bootstrap-combobox/css/bootstrap-combobox.css',
        'bootstrap-select/dist/css/bootstrap-select.min.css',
        'bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        'jquery-tagit/css/jquery.tagit.css',
        'switchery/switchery.css',
        'powerange/dist/powerange.min.css'
    ]) !!}

    <style>
        .tab-content{
            padding: 0px;
            margin-bottom: 0px;
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
                    <h4 class="panel-title">文章表单</h4>
                </div>
                <div class="panel-body">
                    <form id="article-frm" class="form-horizontal" action="/" method="POST">
                        <fieldset>
                            <legend>添加/修改文章</legend>
                            <div class="form-group">
                                <label class="col-md-2 control-label">标题</label>
                                <div class="col-md-10">
                                    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => '请输入文章标题']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">文章分类</label>
                                <div class="col-md-10">
                                    <select class="form-control selectpicker " name="category" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" >
                                        <option value="" >请选择文章分类</option>
                                        <option value="AF">Laravel</option>
                                        <option value="AL">PHP</option>
                                        <option value="DZ">JS</option>
                                        <option value="AS">HTML</option>
                                        <option value="AD">CSS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">文章内容</label>
                                <div class="col-md-10">
                                    <div class="editor">
                                        {!! Form::textarea('content', null, ['id' => 'myEditor']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">文章标签</label>
                                <div class="col-md-10">
                                    <ul id="jquery-tagIt-white" class="white" data-parsley-required="true">
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">文章状态</label>
                                <div class="col-md-10">
                                    <label>
                                        {!! Form::radio('status', 1, isset($article) ? null : true) !!} 正常发布
                                    </label>
                                    <label>
                                        {!! Form::radio('status', 1) !!} 隐藏文章
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-2 control-label">发布时间</label>
                                <div class="col-md-10">
                                    {!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <input type="hidden" name="status" id="article-status" for="jquery-tagIt-white" >

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    {!! Form::submit('提交', ['class' => 'btn btn-primary m-r-5']) !!}
                                    <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
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
        'plugins/masked-input/masked-input.min.js',
        'plugins/bootstrap-combobox/js/bootstrap-combobox.js',
        'plugins/bootstrap-select/bootstrap-select.min.js',
        'plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
        'plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js',
        'plugins/jquery-tag-it/js/tag-it.min.js',
        'js/apps.min.js',
        'js/form-plugins.demo.min.js',
        'plugins/parsley/dist/parsley.js',
        'plugins/switchery/switchery.min.js',
        'plugins/powerange/powerange.min.js',
        'js/form-slider-switcher.demo.min.js'
        ])
     !!}

    <script>
        App.init();
        handleFormMaskedInput();
        handleJqueryAutocomplete();
        handleBootstrapCombobox();
        handleSelectpicker();
        $("#jquery-tagIt-white").tagit({
            singleField: true,
            singleFieldNode : $('#article-status')
        });
        handleTagsInput();
        FormSliderSwitcher.init();
    </script>
    {!! createConcat('static/package', [
        'codemirror/lib/codemirror.css'
    ]) !!}
    {!! createConcat('static/package', [
        'marked/lib/marked.js',
        'codemirror/lib/codemirror.js',
        'zeroclipboard/dist/ZeroClipboard.min.js',
    ]) !!}

    {!! createConcat('plugin/editor/css/', [
        'pygment_trac.css', 'editor.css'
    ]) !!}
    {!! createConcat('plugin/editor/js/', [
        'highlight.js', 'modal.js', 'MIDI.js', 'fileupload.js', 'bacheditor.js'
    ]) !!}

    <script>
        $(function(){
            url = "{{ url(config('editor.uploadUrl')) }}";
            var myEditor = new Editor(url);
            myEditor.render('#myEditor');
        });

    </script>
    <script>
        $(document).on('submit', '#article-frm', function(){
            $.ajax({
                url : "{{ route('admin.article.store') }}",
                type : 'POST',
                data : {
                    'title' : $("input[name='title']").val(),
                    'tags' : $("#jquery-tagIt-white").tagit('tagInput'),
                    'categroy' : $("[name='category']").val(),
                },
                success : function(){

                }
            });
            return false;
        });
    </script>
@stop