@extends('layouts.dashboard')
@section('title')
    Ubah Profil
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card-style settings-card-1 mb-30">
            <div class="title mb-30">
                <h6>Ubah Profil</h6>
            </div>
            <form action="{{ route('dashboard.user.update', $hash->encodeHex($item->id)) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="col-12">
                    <div class="profile-info">
                        <div class="d-flex align-items-center mb-30">
                            <div class="profile-image">
                                @if (Str::startsWith($item->avatar, 'upload/user_avatar/'))
                                    <img id="output" src="{{ Storage::url($item->avatar) }}" alt="Profile Photo" />
                                @elseif (!$item->avatar)
                                    <img id="output" src="https://ui-avatars.com/api/?name={{ $item->name }}" alt="Profile Photo" />
                                @else
                                    <img id="output" src="{{ $item->avatar }}" alt="Profile Photo" />
                                @endif
                                <div class="update-image">
                                    <input type="file" name="avatar" accept="image/*" onchange="loadFile(event)" class="form-control @error('avatar') is-invalid @enderror" value="{{ $item->avatar }}" />
                                    <label for="avatar"><i class="lni lni-camera"></i></label>
                                </div>
                            </div>
                            <div class="profile-meta">
                                <h5 class="text-bold text-dark mb-10">{{ $item->name }}</h5>
                                <p class="text-sm text-gray">{{ $item->email }}</p>
                            </div>
                        </div>
                        @error('avatar')
                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                        <div class="input-style-1">
                            <label for="name">Nama</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Anda" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}" autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                        <button type="submit" class="main-btn primary-btn btn-hover m-2">
                            Ubah Profil
                        </button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="main-btn warning-btn-outline m-2">
                                Ubah Kata Sandi
                            </a>
                        @endif
                        <a href="{{ route('dashboard.index') }}" class="main-btn danger-btn-outline m-2">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush