<div class="widget">
    <h4 class="title">标签云</h4>
    <div class="content tag-cloud">
        @if(!empty($tagList))
            @foreach($tagList as $tag)
                <a href="{{ url('tagArticle',['id'=>$tag->id]) }}" title="{{ $tag->name }}">{{ $tag->name }}</a>
            @endforeach
        @endif
    </div>
</div>