<h4>热门文章</h4>
<section class="repo-card">
    <ul class="boxed-group-inner mini-repo-list">

        @if(!empty($hotArticleList))
            @foreach($hotArticleList as $hotArticle)
                <li class="public source ">
                    <a href="{{ route('article.show',array('id'=>$hotArticle->id)) }}"  class="mini-repo-list-item css-truncate" title="{{ $hotArticle->title }}">
                        <span class="repo-and-owner css-truncate-target">
                            {{ $hotArticle->title }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endif

    </ul>
</section>