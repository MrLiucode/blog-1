@if(Session::has('message'))
    <div class="alert alert-info">
        {{Session::pull('message')}}
        <a href="#" data-dismiss="alert" class="close">×</a>
    </div>
@endif