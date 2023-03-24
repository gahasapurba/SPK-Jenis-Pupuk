{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.auth')
@section('title')
    Masuk
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Selamat Datang Kembali</h1>
                    <p class="text-medium">Masuk menggunakan akun anda untuk melanjutkan</p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/dashboard/images/auth/signin-image.svg') }}" alt="Sign In 1" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/dashboard/images/auth/shape.svg') }}" alt="Sign In 2" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Silahkan Masuk</h6>
                <p class="text-sm mb-25">Untuk memulai menentukan jenis pupuk yang paling tepat untuk tanaman anda</p>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" autofocus placeholder="Masukkan email anda" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password">Kata Sandi</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Masukkan kata sandi anda" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                            <div class="form-check checkbox-style mb-30">
                                <input class="form-check-input" type="checkbox" id="show_password" name="show_password" onclick="myFunction()" />
                                <label class="form-check-label" for="show_password">Tampilkan kata sandi</label>
                            </div>
                            <div class="form-check checkbox-style mb-30">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                            <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="hover-underline">Lupa kata sandi?</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Masuk</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="singin-option pt-40">
                    <p class="text-sm text-medium text-dark text-center">Masih belum memiliki akun? <a href="{{ route('register') }}">Buat akun</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush