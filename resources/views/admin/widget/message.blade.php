@if (count($errors) > 0)
    <div class="alert alert-danger fade in m-b-15">
        <strong>错误信息：</strong>
        {{ $errors->first() }}
        <span class="close" data-dismiss="alert">×</span>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success fade in m-b-15">
        {!! Session::pull('message', '未知错误!') !!}
        <span class="close" data-dismiss="alert">×</span>
    </div>
@endif