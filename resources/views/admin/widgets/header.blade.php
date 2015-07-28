<div id="header">
    <h1><a href="{:U('Home/Index/index')}">LoveTeemo Admin</a></h1>
</div>
<div id="search">
    <input type="text" placeholder="请输入关键字..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">{$user}</span></a></li>
        <li class="btn btn-inverse"><a title="" href="{:U('User/System/index')}"><i class="icon icon-cog"></i> <span class="text">系统设置</span></a></li>
        <li class="btn btn-inverse"><a title="" href="{:U('User/Index/loginout')}"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
    </ul>
</div>