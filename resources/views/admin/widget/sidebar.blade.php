{{-- 左侧菜单栏 --}}
<div id="sidebar" class="sidebar sidebar-grid">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img class="img-circle" src="{{asset('logo.ico')}}" alt=""></a>
                </div>
                <div class="info">
                    Fakeronline <small>PHP开发工程师</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul id="sidebar" class="nav">
            @if(isset($menuList) && empty($menuList))
                <li class="nav-header">暂可用列表，请联系管理提供权限</li>
            @else
                <li class="nav-header">所有可用列表</li>
                @foreach($menuList as $key => $list)
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b><i class="{{array_get($list, 'class', '')}}"></i><span>{{$key}}</span>
                        </a>
                        <ul class="sub-menu">
                            @foreach(array_get($list, 'child', []) as $item)
                                <li><a href="{{route($item['as'])}}">{{$item['text']}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                @endforeach
            @endif
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg">
</div>
<script>
    jQuery(document).ready(function($) {
        // 左侧菜单高亮
        var currentMenu = $('#sidebar a[href="'+window.location.origin + window.location.pathname+'"]:first');
        if(currentMenu.html() == undefined){
            var currentMenu = $('#sidebar a[href="'+ localStorage.getItem('click-link') + '"]:first');
            if(currentMenu.html() == undefined){
                return false;
            }
        }
        currentMenu.parent().addClass('active');
        if (currentMenu) {
            var treeView = currentMenu.closest('.has-sub');

            if (treeView.find('ul').length) {
                return treeView.find('a:first').trigger('click');
            } else {
                return treeView.addClass('active').siblings().removeClass('active');
            }
        };
    });
    $(document).on('click', '.sub-menu a', function(){
        localStorage.setItem('click-link', $(this).attr('href'));
    });
</script>

