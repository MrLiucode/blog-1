@if(Session::has('message'))
    <div class="alert alert-info">
        {{Session::pull('message')}}
    </div>
@endif