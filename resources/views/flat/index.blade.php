@extends('flatVersion.public.layout')

@section('main')
    <div class="timeline">
        <dl>
            @foreach($articleList as $item)
            <dd class="pos-left clearfix">
                <div class="circ" data-toggle="tooltip" data-placement="left" title="" data-original-title="2015-07-30"></div>
                <div class="time">{{date('M t', strtotime($item->created_at))}}</div>
                <div class="events">
                    <div class="pull-left">
                        <img class="events-object img-rounded head-pic-64" src="{{_asset('images/hd_pic.jpg')}}">
                    </div>
                    <div class="events-body">
                        <h5><a href="{{route('article.show', ['id' => $item->id])}}">{{$item->title}}</a></h5>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            </dd>
            @endforeach
            @if(!$articleList->hasMorePages())
            <div class="panel-footer" style="width: 92%; margin-top: 20px;">
                没有更多了...
            </div>
            @endif
        </dl>

    </div>
    <div class="pull-right">
        {!! $articleList->render() !!}
    </div>
@stop