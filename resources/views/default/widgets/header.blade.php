<style>
    .header{height: 20px; line-height: 20px;padding: 5px 5px;}
</style>
<header class="container header">
    <div class="row">
        <div class="col-lg-5 pull-left">
            <img src="{{_asset('images/logo.png')}}" alt="logo">
        </div>
        <div class="col-lg-4" class="pull-right">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="搜索...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        搜索
                    </button>
                  </span>
            </div>
        </div>
        <div class="col-lg-3">
            <button class="btn btn-success">登录</button>
            <button class="btn btn-primary">注册</button>
            <button class="btn btn-info">喜欢的文章</button>
        </div>
        <div class="pull-right"></div>
    </div>
</header>