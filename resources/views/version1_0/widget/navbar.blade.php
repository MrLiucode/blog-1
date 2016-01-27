<nav class="site-header-nav" role="navigation">

    <a href="/" class=" site-header-nav-item" target="" title="Home">Home</a>
    @if($categoryList)
        @foreach($categoryList as $category)
            <a href="{{url('categoryArticle/' . $category->id)}}"
               class="site-header-nav-item">{{ $category->name }}</a>
        @endforeach
    @endif
    <form class="demo_search" action="{{url('search/keyword')}}" method="get">
        <i class="icon_search" id="open"></i>
        <input class="demo_sinput" type="text" name="keyword" id="search_input" placeholder="输入关键字 回车搜索"/>
    </form>
</nav>