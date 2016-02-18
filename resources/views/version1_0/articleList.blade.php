@extends('version1_0.layout.base')

@section('content')
    <section class="banner">
        <div class="collection-head">
            <div class="container">
                <div class="collection-title">
                    <h1 class="collection-header">{!! getConfig('author') !!}</h1>
                    <div class="collection-info">
                    <span class="meta-info">
                        {!! getConfig('motto', '如果没有梦想，那跟咸鱼有什么区别？') !!}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.banner -->
    <section class="container content">
        <div class="columns">
            <div class="column two-thirds" >
                <ol class="repo-list">
                    @if(!empty($articleList))
                        @foreach($articleList as $article)
                            <li class="repo-list-item">
                                <h3 class="repo-list-name">
                                    <a href="{{ route('article.show',array('id'=>$article->id)) }}" title="{{ $article->title }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="repo-list-description">
                                    {{ strCut(conversionMarkdown($article->content),80) }}
                                </p>
                                <p class="repo-list-meta">
                                    <span class="octicon octicon-calendar"></span>{{ $article->published_at }}
                                </p>
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
            <div class="column one-third">
                @include('version1_0.widget.hotArticle')
                @include('version1_0.widget.tagCloud')
                @include('version1_0.widget.friendship')
            </div>
        </div>
        <div class="pagination text-align">
            {!! $articleList->render(new \App\Components\CustomPage($articleList)) !!}
        </div>
        <!-- /pagination -->
    </section>
    <!-- /section.content -->

@endsection