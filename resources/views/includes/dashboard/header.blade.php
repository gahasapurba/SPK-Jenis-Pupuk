<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-20">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <i class="lni lni-chevron-left me-2"></i> Menu
                        </button>
                    </div>
                    <div class="header-search d-none d-md-flex">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                                <div class="info">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <div class="image">
                                        @if (Str::startsWith(Auth::user()->avatar, 'upload/avatar/'))
                                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Profile Photo" />
                                        @elseif (!Auth::user()->avatar)
                                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile Photo" />
                                        @else
                                            <img src="{{ Auth::user()->avatar }}" alt="Profile Photo" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <i class="lni lni-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            {{-- <li>
                                <a href="{{ route('dashboard.user.index') }}">
                                    <i class="lni lni-user"></i> Ubah Profil
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="lni lni-exit"></i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>