@extends('admin.base')

@section('main')

    <div style="margin-top: 20px;" >
        <div class="panel panel-default">
            <div class="panel-heading">
                基本设置
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal">

                    <div class="control-group">
                        <label class="control-label">网站标题：</label>
                        <div class="controls">
                            <input type="text" name="title" value="LoveTeemo">
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_title" class="control-label">网站标题：</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="website_title" id="website_title" >
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_keyword" class="control-label">网站关键字：</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="website_keyword" id="website_keyword">
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_description" class="control-label">网站描述：</label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" name="website_description"></textarea>
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_author" class="control-label">网站作者：</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="website_author" id="website_author">
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_icp" class="control-label">备案号：</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="website_icp" id="website_icp">
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>

                    <div class="row mn20 pdl0">
                        <div class="col-md-2 text-right">
                            <label for="website_copy" class="control-label">版权：</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="website_copy" id="website_copy">
                        </div>
                        <div class="col-md-6 lh30">
                            错误提示
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">保存</button>
                </form>
            </div>
        </div>
    </div>

@stop