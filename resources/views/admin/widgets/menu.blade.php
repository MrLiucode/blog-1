<div id="sidebar">
    <ul>
        <li><a href="{:U('User/Index/index')}"><i class="icon icon-home"></i> <span>系统首页</span></a></li>
        <li   class="submenu">
            <a href="#"><i class="icon icon-pencil"></i> <span>发表内容</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/Said/addSaid')}">发表说说</a></li>
                <li><a href="{:U('User/Article/addArticle')}">发表文章</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-th-list"></i> <span>内容管理</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/Said/saidList')}">说说列表</a></li>
                <li><a href="{:U('User/Article/articleList')}">文章列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-user"></i> <span>用户管理</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/User/addUser')}">新增用户</a></li>
                <li><a href="{:U('User/User/userList')}">用户列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon  icon-align-left"></i> <span>栏目管理</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/Tag/addTag')}">新增栏目</a></li>
                <li><a href="{:U('User/Tag/tagList')}">栏目列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-book"></i> <span>相册管理</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/Album/addAlbum')}">新增相册</a></li>
                <li><a href="{:U('User/Album/albumList')}">相册列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-camera"></i> <span>图片管理</span> <span class="label">2</span></a>
            <ul>
                <li><a href="{:U('User/Picture/addPicture')}">新增图片</a></li>
                <li><a href="{:U('User/Picture/pictureList')}">图片列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-retweet"></i> <span>互动管理</span> <span class="label">4</span></a>
            <ul>
                <li><a href="{:U('User/Said/saidContent')}">说说评论</a></li>
                <li><a href="{:U('User/Article/articleContent')}">文章评论</a></li>
                <li><a href="{:U('User/Album/albumContent')}">相册评论</a></li>
                <li><a href="{:U('User/Content/content')}">留言评论</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-resize-small"></i> <span>友联管理</span></a>
            <ul>
                <li><a href="{:U('User/Link/editLink')}">管理友联</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-cog"></i> <span>系统设置</span> <span class="label">3</span></a>
            <ul>
                <li><a href="{{route('system.base.option.index')}}">基本设置</a></li>
                <li><a href="{:U('User/System/setting')}">高级设置</a></li>
                <li><a href="{:U('User/Version/index')}">版本设置</a></li>
            </ul>
        </li>
    </ul>
</div>