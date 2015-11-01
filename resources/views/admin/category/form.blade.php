<fieldset>
    <legend>{{isset($category) ? '添加' : '修改'}}分类文章</legend>
    <div class="form-group">
        {!! Form::label('name', '分类名称', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '请输入分类名称', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', '分类描述', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => '请输入分类描述', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('order', '排序', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('number', 'order', isset($category) ? null : 100, ['class' => 'form-control', 'min' => '100', 'max' => '999', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary m-r-5">提交</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
        </div>
    </div>
</fieldset>