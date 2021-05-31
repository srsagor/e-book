<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{asset('tabler/static/shipping-corporation-logo.png')}}" width="110" height="32" alt="PMIS"
                    class="navbar-brand-image">
                <span class="navbar-text">Bangladesh Shipping Corporation</span>
            </a>

        </h1>
        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url('{{asset('tabler/static/avatars/000m.jpg')}}')"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>