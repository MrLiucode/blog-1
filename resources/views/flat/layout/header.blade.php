<div class="docs-header">
    <!--nav-->
    <nav class="navbar navbar-default navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">{{array_get($optionList, 'website_author', '')}}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link current" href="{{route('home')}}">首页</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">文章类型 <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach($category as $item)
                            <li><a href="#">{{array_get($item, 'name', '未知分类')}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav-link" href="documentation.html">随笔</a></li>
                    <li><a class="nav-link" href="free-psd.html">留言</a></li>
                    <li><a class="nav-link" href="color-picker.html">关于我的</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--header-->
    <div class="topic">
        <div class="container">
            <div class="col-md-12">
                <h3>{{array_get($optionList, 'website_author', '')}}</h3>
                <h4>{{array_get($optionList, 'website_description', '')}}</h4>
            </div>
        </div>
        <div class="topic__infos">
            <div class="container">
                {{array_get($optionList, 'website_motto', '')}}
            </div>
        </div>
    </div>
</div>