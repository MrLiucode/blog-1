<fieldset>
    <legend>添加/修改文章</legend>
    <div class="form-group">
        <label class="col-md-2 control-label">标题</label>
        <div class="col-md-10">
            {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">文章分类</label>
        <div class="col-md-10">
            {!! Form::select('category[]', [], null, ['class' => 'form-control selectized', 'id' => 'category', 'placeholder' => '请选择文章分类', 'tabindex' => '-1', 'multiple' => 'multiple']) !!}
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
            {!! Form::select('tags[]', $tagList, $tagList, ['class' => 'form-control selectized', 'id' => 'tags', 'placeholder' => '请选择文章分类', 'tabindex' => '-1', 'multiple' => 'multiple']) !!}
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

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            {!! Form::submit('提交', ['class' => 'btn btn-primary m-r-5']) !!}
            <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
        </div>
    </div>
</fieldset>