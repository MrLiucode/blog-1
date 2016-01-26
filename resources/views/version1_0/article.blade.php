@extends('version1_0.layout.base')
@section('content')
    <section class="banner">
        <div class="collection-head">
            <div class="container">
                <div class="collection-title">
                    <h1 class="collection-header">{{ $article->title }}</h1>
                    <div class="collection-info">
                        <span class="meta-info">
                            <span class="octicon octicon-calendar"></span> {{ $article->created_at->format('Y-m-d') }}
                        </span>
                    </div>
                    <div class="collection-info">
                        <span class="meta-info">
                            {{ strCut(conversionMarkdown($article->content),40) }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.banner -->
    <section class="container content">
        <div class="columns">
            <div class="column three-fourths">
                <article class="article-content markdown-body">
                    {!! conversionMarkdown($article->content) !!}
                </article>
                <div class="share">
                    <div class="share-bar"></div>
                </div>
                <div class="comment">
                    <div class="comments">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            var disqus_shortname = "{{ config('disqus.disqus_shortname') }}";
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the &lt;a href="http://disqus.com/?ref_noscript"&gt;comments powered by Disqus.&lt;/a&gt;</noscript>
                    </div>
                </div>
            </div>

            <div class="column one-fourth">
                <div id="author" class="clearfix">
                    <a href="" title="{{ $article->user->name }}">
                        <img class="img-circle" src="{{asset('static/images/hd_pic.jpg')}}" height="96" width="96" alt="{{ $article->user->name }}" title="{{ $article->user->name }}">
                    </a>
                    <div class="author-info">
                        <h3>
                            <a href="/" title="{{ $article->user->name }}">
                                {{ $article->user->name }}
                            </a>
                        </h3>
                        <p>
                            {!! strip_tags(conversionMarkdown($article->user->desc)) !!}
                        </p>
                    </div>
                </div>
                @include('version1_0.widget.right')
            </div>
        </div>
    </section>
@endsection

@section('script')
    {!! createConcat('') !!}
@stop

