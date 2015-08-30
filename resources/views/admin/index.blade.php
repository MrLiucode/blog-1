@extends('admin.layout.base')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/jquery.tagsinput.css')}}" />
@stop
@section('main')
    <div class="twelve wide column">
        <div class="pageHeader">
            <div class="segment">
                <h3 class="ui dividing header">
                    <i class="large add icon"></i>
                    <div class="content">
                        添加文章
                    </div>
                </h3>
            </div>
        </div>
        <div class="ui form fluid vertical segment">
            <form name="form" action="/user/new_sensor/" method="post">
                <div class="two fields">
                    <div class="field">
                        <label>文章标题</label>
                        <div class="ui fluid icon input">
                            <input type="text" placeholder="请输入文章标题" name="title" value=""/>
                            <i class="exchange icon"></i>

                        </div>
                        <div class="ui fluid icon input">
                            <input type="text" placeholder="广泛搜索">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>类型</label>
                    <div class="ui dropdown selection">
                        <input type="hidden" name="gender" value="1">
                        <div class="default text">数值型</div>
                        <i class="dropdown icon"></i>
                        <div class="menu" name="sensor_type" id="sensor_type">
                            <div class="item active" data-value="数值型" value="0">数值型</div>
                            <div class="item" data-value="开关型" value="5">开关型</div>
                            <div class="item" data-value="GPS型" value="6">GPS型</div>
                            <div class="item" data-value="泛传感器型" value="8">泛传感器型</div>
                            <div class="item" data-value="图像传感器型" value="9">图像传感器型</div>
                            <div class="item" data-value="微博抓取型" value="10">微博抓取型</div>
                        </div>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <div class="field">
                            <label>标签（tags）</label>
                            <input type="text" id="sensor_tags" name="sensor_tags"/>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>描述</label>
                    <textarea placeholder="不超过30个字符……"></textarea>
                </div>
                <input class="ui small blue submit button" type="submit" value="保存">
                <input class="ui small basic button" type="reset" value="取消">
            </form>
            <!--the form end-->
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{asset('admin/js/jquery.tagsinput.js')}}"></script>
    <script>
        $(function(){
            $('#sensor_tags').tagsInput();
        });
    </script>
@stop