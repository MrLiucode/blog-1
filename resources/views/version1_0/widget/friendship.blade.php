<h4>友情链接</h4>
<section class="repo-card">
    <ul class="boxed-group-inner mini-repo-list">
        @if(!empty($linkList))
            @foreach($linkList as $link)
                <li class="public source ">
                    <a href="{{ $link->url }}" target="_blank"  class="mini-repo-list-item css-truncate">
                        <span class="repo-and-owner css-truncate-target">
                            {{ $link->name }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</section>