<fieldset>
    <legend>{{isset($group) ? '添加' : '修改'}}权限组</legend>
    <div class="form-group">
        {!! Form::label('name', '权限组名称', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '请输入权限组名称', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', '权限组描述', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => '请输入权限组描述', 'data-parsley-required' => 'true']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('', '权限', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            <fieldset>
                <legend>权限列表</legend>
                <div class="row" id="permission-list">
                    @foreach($permissionList as $item)
                        <div class="col-md-3">
                            <label>
                                <input name="permission_id[]" type="checkbox" data-disabled-opacity="0.5" data-render="switchery" data-theme="green" data-change="check-article-state" value="{{$item->id}}" @if( isset($group) && in_array($item->id, $groupPermissionList) ) checked @endif/>
                                <span class="label label-primary">{{$item->ident}} {!! $item->description ? "[$item->description]" : '' !!}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary m-r-5">提交</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
        </div>
    </div>
</fieldset>