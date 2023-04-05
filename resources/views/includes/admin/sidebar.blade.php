<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="{{ route('admin.index') }}">
            <img src="{{ asset('assets/dashboard/images/logo/logo1.png') }}" alt="SPK Jenis Pupuk" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            {{-- Dashboard --}}
            <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
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
            {{-- Data Kriteria --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('admin/criteria*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="lni lni-database"></i>
                    </span>
                    <span class="text">Data Kriteria</span>
                </a>
                <ul id="ddmenu_1" class="collapse {{ (request()->is('admin/criteria*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('admin.criteria.index') }}" class="{{ (request()->is('admin/criteria')) ? 'active' : '' }}">Daftar Data Kriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.criteria.create') }}" class="{{ (request()->is('admin/criteria/create')) ? 'active' : '' }}">Buat Data Kriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.criteria.trash') }}" class="{{ (request()->is('admin/criteria/trash')) ? 'active' : '' }}">Arsip Data Kriteria</a>
                    </li>
                </ul>
            </li>
            {{-- Data Subkriteria --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('admin/subcriteria*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="lni lni-tab"></i>
                    </span>
                    <span class="text">Data Subkriteria</span>
                </a>
                <ul id="ddmenu_2" class="collapse {{ (request()->is('admin/subcriteria*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('admin.subcriteria.index') }}" class="{{ (request()->is('admin/subcriteria')) ? 'active' : '' }}">Daftar Data Subkriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subcriteria.create') }}" class="{{ (request()->is('admin/subcriteria/create')) ? 'active' : '' }}">Buat Data Subkriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subcriteria.trash') }}" class="{{ (request()->is('admin/subcriteria/trash')) ? 'active' : '' }}">Arsip Data Subkriteria</a>
                    </li>
                </ul>
            </li>
            {{-- Data Alternatif --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('admin/alternative*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="lni lni-package"></i>
                    </span>
                    <span class="text">Data Alternatif</span>
                </a>
                <ul id="ddmenu_3" class="collapse {{ (request()->is('admin/alternative*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('admin.alternative.index') }}" class="{{ (request()->is('admin/alternative')) ? 'active' : '' }}">Daftar Data Alternatif</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.alternative.create') }}" class="{{ (request()->is('admin/alternative/create')) ? 'active' : '' }}">Buat Data Alternatif</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.alternative.trash') }}" class="{{ (request()->is('admin/alternative/trash')) ? 'active' : '' }}">Arsip Data Alternatif</a>
                    </li>
                </ul>
            </li>
            {{-- Data Penilaian --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('admin/assessment*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <i class="lni lni-bookmark-alt"></i>
                    </span>
                    <span class="text">Data Penilaian</span>
                </a>
                <ul id="ddmenu_4" class="collapse {{ (request()->is('admin/assessment*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('admin.assessment.index') }}" class="{{ (request()->is('admin/assessment')) ? 'active' : '' }}">Daftar Data Penilaian</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.assessment.create') }}" class="{{ (request()->is('admin/assessment/create')) ? 'active' : '' }}">Buat Data Penilaian</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.assessment.trash') }}" class="{{ (request()->is('admin/assessment/trash')) ? 'active' : '' }}">Arsip Data Penilaian</a>
                    </li>
                </ul>
            </li>
            {{-- Divider --}}
            <span class="divider"><hr /></span>
            {{-- Pengguna --}}
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="{{ (request()->is('admin/user*')) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                        </svg>
                    </span>
                    <span class="text">Pengguna</span>
                </a>
                <ul id="ddmenu_5" class="collapse {{ (request()->is('admin/user*')) ? 'show' : '' }} dropdown-nav">
                    <li>
                        <a href="{{ route('admin.user.index') }}" class="{{ (request()->is('admin/user')) ? 'active' : '' }}">Daftar Pengguna</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.trash') }}" class="{{ (request()->is('admin/user/trash')) ? 'active' : '' }}">Arsip Pengguna</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</aside>
<div class="overlay"></div>
