<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="#">
            <img src="{{ asset('assets/dashboard/images/logo/logo.svg') }}" alt="logo" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            {{-- Dashboard --}}
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="#">
                    <span class="icon">
                        <i class="lni lni-home"></i>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            {{-- Data Kriteria --}}
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ route('indexDataKriteria') }}">
                    <span class="icon">
                        <i class="lni lni-database"></i>
                    </span>
                    <span class="text">Data Kriteria</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<div class="overlay"></div>
