<aside class="sidebar-nav-wrapper @if(Auth::check() && Auth::user()->hasVerifiedEmail()) @else active @endif">
    @if(Auth::check() && Auth::user()->hasVerifiedEmail())
    <div class="navbar-logo">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('assets/dashboard/images/logo/logo1.png') }}" alt="SPK Jenis Pupuk" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            {{-- Dashboard --}}
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                        </svg>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            {{-- Divider --}}
            <span class="divider"><hr /></span>
            {{-- Data Hasil Utilitas Kuantitatif --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('dashboard/quantitative_utility*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="lni lni-database"></i>
                    </span>
                    <span class="text">Data Hasil Utilitas Kuantitatif</span>
                </a>
                <ul id="ddmenu_1" class="collapse {{ (request()->is('dashboard/quantitative_utility*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('dashboard.quantitative_utility.index') }}" class="{{ (request()->is('dashboard/quantitative_utility')) ? 'active' : '' }}">Daftar Data Hasil Utilitas Kuantitatif</a>
                    </li>
                </ul>
            </li>
            {{-- Divider --}}
            <span class="divider"><hr /></span>
            {{-- Ubah Profil --}}
            <li class="nav-item {{ (request()->is('dashboard/user*')) ? 'active' : '' }}">
                <a href="{{ route('dashboard.user.index') }}">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                        </svg>
                    </span>
                    <span class="text">Ubah Profil</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
</aside>
<div class="overlay"></div>