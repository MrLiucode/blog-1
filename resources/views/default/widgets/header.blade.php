<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="../" class="navbar-brand">飞客</a>
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar-main">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">文章类型 <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="type">
                                    <li><a href="http://jsfiddle.net/bootswatch/q0gdqa1q/">HTML</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./bootstrap.min.css">PHP</a></li>
                                    <li><a href="./bootstrap.css">bootstrap.css</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./variables.less">variables.less</a></li>
                                    <li><a href="./bootswatch.less">bootswatch.less</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./_variables.scss">_variables.scss</a></li>
                                    <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../help/">Help</a>
                            </li>
                            <li>
                                <a href="http://news.bootswatch.com">Blog</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Cyborg <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="download">
                                    <li><a href="http://jsfiddle.net/bootswatch/q0gdqa1q/">Open Sandbox</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
                                    <li><a href="./bootstrap.css">bootstrap.css</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./variables.less">variables.less</a></li>
                                    <li><a href="./bootswatch.less">bootswatch.less</a></li>
                                    <li class="divider"></li>
                                    <li><a href="./_variables.scss">_variables.scss</a></li>
                                    <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
                                </ul>
                            </li>
                        </ul>

                        <form class="navbar-form navbar-left nav-form visible-lg " role="search">
                            <div class="input-group w350">
                                <input type="text" class="form-control text-sm" placeholder="关键字">
                                <span class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button">搜索</button>
                                </span>
                            </div>
                        </form>

                        <form class="navbar-form navbar-right nav-form " role="user">
                            <button class="btn btn-success btn-sm">登录</button>
                            <button class="btn btn-primary btn-sm">注册</button>
                            <button class="btn btn-danger btn-sm">喜欢的文章</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row header carousel">
        <div class="col-lg-8">
            <div class="info">
                <figure>
                    <img class="img-rounded" src="{{_asset('images/art.jpg')}}" alt="秋。。。相知">
                    <figcaption>
                        <strong>渡人如渡己，渡己，亦是渡。</strong>
                        当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="col-lg-4 visible-lg">
            <div class="well bs-component">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>我的名片</legend>
                        <p>网名：Fakeronline | 菜鸟不会飞~</p>
                        <p>职业：PHP程序员</p>
                        <p>邮箱：1077341744@qq.com</p>
                        <ul class="linkmore">
                            <li><a href="/" class="talk" title="给我留言"></a></li>
                            <li><a href="/" class="address" title="联系地址"></a></li>
                            <li><a href="/" class="email" title="给我写信"></a></li>
                            <li><a href="/" class="photos" title="生活照片"></a></li>
                            <li><a href="/" class="heart" title="关注我"></a></li>
                        </ul>
                    </fieldset>
                </form>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
        </div>
    </div>
</div>
