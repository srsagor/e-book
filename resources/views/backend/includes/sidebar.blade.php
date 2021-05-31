@php($roleWiseMinimizedClass = auth()->user()->hasRole('agent')?:'c-sidebar-lg-show')
{{--@if(auth()->user()->hasRole('agent'))
    const sidebarSelector = $("#sidebar");
    sidebarSelector.removeClass('c-sidebar-show')
    sidebarSelector.removeClass('c-sidebar-lg-show')

@endif--}}
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed {{$roleWiseMinimizedClass}}" id="sidebar">
{{--<div class="c-sidebar c-sidebar-dark c-sidebar-fixed" id="sidebar">--}}
    <div class="c-sidebar-brand">
        <a href="{{route("backend.dashboard")}}">
            <img class="c-sidebar-brand-full" src="{{getSetting()->getFrontLogoLink()}}" height="40" style="max-height: 50px !important;"
                 alt="{{ getSetting()->app_name }}">
            <img class="c-sidebar-brand-minimized" src="{{getSetting()->getFrontLogoLink()}}" height="40"
                 alt="{{ getSetting()->app_name }}">
        </a>
    </div>

    {!! $admin_sidebar->asUl( ['class' => 'c-sidebar-nav'], ['class' => 'c-sidebar-nav-dropdown-items'] ) !!}

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
