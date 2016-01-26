<div class="form-group">
    {!! Form::label('name', '网站名称', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'site_name', null, ['class' => 'form-control', 'placeholder' => '请输入网站名称', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '关键字', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'keyword', null, ['class' => 'form-control', 'placeholder' => '请输入关键字', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '描述', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '请输入描述', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '作者', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'author', null, ['class' => 'form-control', 'placeholder' => '请输入作者', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '备案号', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'icp', null, ['class' => 'form-control', 'placeholder' => '请输入备案号', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '版权', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'copyright', null, ['class' => 'form-control', 'placeholder' => '请输入版权', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', '座右铭', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'motto', null, ['class' => 'form-control', 'placeholder' => '请输入座右铭', 'data-parsley-required' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2" style="margin-top: 20px;">
        <button type="submit" class="btn btn-primary m-r-5">提交</button>
        <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
    </div>
</div>