<aside class="sidebar-nav-wrapper @auth @else active @endauth">
    @auth
    <div class="navbar-logo">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('assets/dashboard/images/logo/logo.svg') }}" alt="logo" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            {{-- Dashboard --}}
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <span class="icon">
                        <i class="lni lni-home"></i>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
    @endauth
</aside>
<div class="overlay"></div>