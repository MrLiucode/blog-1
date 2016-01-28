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
        'selectize/dist/css/selectize.bootstrap3.css',

        'jquery-tagit/css/jquery.tagit.css',
        'switchery/switchery.css',
        'powerange/dist/powerange.min.css'
    ]) !!}

    <style>
        .tab-content {
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">文章表单</h4>
                </div>
                <div class="panel-body">
                    @include('admin.widget.message')
                    @if(isset($article))
                        {!! Form::model($article, ['url' => route('admin.article.update', ['id' => $article->id]), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::open(['url' => route('admin.article.store'), 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    @endif
                    @include('admin.article.form')
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@stop

@section('js')

    {!! createConcat('static/package', [
        'datatables/media/js/jquery.dataTables.min.js',
        'masked-input/masked-input.js',
        'bootstrap-combobox/js/bootstrap-combobox.js',
        'selectize/dist/js/standalone/selectize.min.js',
    ]) !!}

    <script>
        App.init();
        handleJqueryAutocomplete();
        handleBootstrapCombobox();
        handleSelectpicker();

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
        $(function () {
            url = "{{ url(config('editor.uploadUrl')) }}";
            var myEditor = new Editor(url);
            myEditor.render('#myEditor');
            $('#category,#tags').selectize({
                allowEmptyOption: true,
                persist: false,
                maxItems: 5,
                sortField: {
                    field: 'text',
                    direction: 'asc'
                }
            });
        });
    </script>
@stop