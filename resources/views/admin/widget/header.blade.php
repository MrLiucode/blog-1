
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
    <!-- Branding -->
    <div class="navbar-header col-md-2">
        <a class="navbar-brand" href="{{url()}}">
            <strong>Fakeronline</strong>
        </a>
        <div class="sidebar-collapse">
            <a href="#">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Branding end -->


    <!-- .nav-collapse -->
    <div class="navbar-collapse">

        @include('admin.widget.navbar')
        @include('admin.widget.sidebar')

    </div>
</div>
<!-- Fixed navbar end -->