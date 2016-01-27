<fieldset>
    <legend>{{isset($category) ? '添加' : '修改'}}友情链接</legend>
    <div class="form-group">
        {!! Form::label('name', '商家名称', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '请输入商家名称', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', '商标链接地址', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('url', 'logo_path', null, ['class' => 'form-control', 'placeholder' => '请输入商标链接地址', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', '商家链接', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('url', 'url', null, ['class' => 'form-control', 'placeholder' => '请输入商家链接', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary m-r-5">提交</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
        </div>
    </div>
</fieldset>