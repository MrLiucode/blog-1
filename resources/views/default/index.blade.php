@extends('default.layouts.base')

@section('main')
<div class="row">
    <div class="container">
        <div class="col-lg-8 pdlr0">
            @include('default.widgets.left')
        </div>
        @include('default.widgets.right')
    </div>
</div>
@stop



