@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-error">
            <span class="icon-hand-right"></span> {{ $error }}
            <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
    @endforeach
@endif

