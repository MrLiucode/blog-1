@extends('default.layouts.base')

@section('main')
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
    <div class="row">
        <div class="container">
            <div class="col-lg-8 pdlr0">
                @include('default.widgets.left')
            </div>
            <div class="col-lg-4 visible-lg pdr0">
                @include('default.widgets.right')
            </div>
        </div>
    </div>
@stop



