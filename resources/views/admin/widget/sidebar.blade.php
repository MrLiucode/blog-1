<!-- Sidebar -->
<ul class="nav navbar-nav side-nav" id="sidebar">

    <li class="collapsed-content">
        <ul>
            <li class="search"><!-- Collapsed search pasting here at 768px --></li>
        </ul>
    </li>

    <li class="navigation" id="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="#navigation">Navigation <i class="fa fa-angle-up"></i></a>

        <ul class="menu">

            <li class="active">
                <a href="index.html">
                    <i class="fa fa-tachometer"></i> 控制面板
                    <span class="badge badge-red">1</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-list"></i> 系统设置 <b class="fa fa-plus dropdown-plus"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">
                            <i class="fa fa-caret-right"></i> 基本设置
                        </a>
                    </li>
                    <li>
                        <a href="validation-elements.html">
                            <i class="fa fa-caret-right"></i> 高级设置
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-list"></i> 文章管理 <b class="fa fa-plus dropdown-plus"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">
                            <i class="fa fa-caret-right"></i> 文章列表
                        </a>
                    </li>
                    <li>
                        <a href="validation-elements.html">
                            <i class="fa fa-caret-right"></i> 留言列表
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-list"></i> 权限控制 <b class="fa fa-plus dropdown-plus"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">
                            <i class="fa fa-caret-right"></i> 用户管理
                        </a>
                    </li>
                    <li>
                        <a href="validation-elements.html">
                            <i class="fa fa-caret-right"></i> 角色管理
                        </a>
                    </li>
                    <li>
                        <a href="form-wizard.html">
                            <i class="fa fa-caret-right"></i> 权限管理
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </li>

    <li class="summary" id="order-summary">
        <a href="#" class="sidebar-toggle underline" data-toggle="#order-summary">数据情况 <i class="fa fa-angle-up"></i></a>

        <div class="media">
            <a class="pull-right" href="#">
                <span id="sales-chart"></span>
            </a>
            <div class="media-body">
                文章浏览量
                <h3 class="media-heading">26, 149</h3>
            </div>
        </div>

        <div class="media">
            <a class="pull-right" href="#">
                <span id="balance-chart"></span>
            </a>
            <div class="media-body">
                文章搜索量
                <h3 class="media-heading">318, 651</h3>
            </div>
        </div>

    </li>

    <li class="settings" id="general-settings">
        <a href="#" class="sidebar-toggle underline" data-toggle="#general-settings">同步设置 <i class="fa fa-angle-up"></i></a>

        <div class="form-group">
            <label class="col-xs-8 control-label">微信同步</label>
            <div class="col-xs-4 control-label">
                <div class="onoffswitch greensea">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-on" checked="">
                    <label class="onoffswitch-label" for="switch-on">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-8 control-label">APP同步</label>
            <div class="col-xs-4 control-label">
                <div class="onoffswitch greensea">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-off">
                    <label class="onoffswitch-label" for="switch-off">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>

    </li>


</ul>
<!-- Sidebar end -->