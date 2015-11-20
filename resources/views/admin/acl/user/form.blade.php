<fieldset>
    <legend>{{isset($group) ? '添加用户' : '修改用户信息'}}</legend>
    <div class="form-group">
        {!! Form::label('name', '昵称', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '请输入昵称', 'data-parsley-required' => 'true', 'data-parsley-required-message' => '昵称不能为空!']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', '邮箱', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => '请输入邮箱地址', 'data-parsley-required' => 'true', 'data-parsley-required-message' => '邮箱地址不能为空!', 'data-parsley-email' => 'true', 'data-parsley-email-message' => '请输入正确的邮箱地址!']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('password', '密码', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => '请输入密码', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'focusout', 'data-parsley-required-message' => '密码不能为空!', 'data-parsley-minlength' => '6', 'data-parsley-minlength-message' => '密码位数不可少于6位', 'data-parsley-maxlength' => '16', 'data-parsley-maxlength-lenght' => '16', 'data-parsley-maxlength-message' => '密码位数不可多于16位' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', '确认密码', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => '请输入密码', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'focusout', 'data-parsley-required-message' => '确认密码不能为空!', 'data-parsley-equalto' => '[name=password]', 'data-parsley-equalto-messag' => '两次密码输入不一致' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', '所属权限组', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            @foreach($groupList as $group)
                <div class="col-md-3">
                    <label>
                        <input type="checkbox" name="group_id[]" data-disabled-opacity="0.5" data-render="switchery" data-theme="green" data-change="check-article-state" value="{{$group->id}}">
                        <span class="label label-primary">{{$group->name}}</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('status', '状态', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            <label>{!! Form::radio('status', 1, isset($user) ? null : true) !!} <span> 正常</span></label> &nbsp;&nbsp;&nbsp;&nbsp;
            <label>{!! Form::radio('status', -1, null) !!} <span> 禁止登录</span></label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary m-r-5">提交</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">取消</a>
        </div>
    </div>
</fieldset>