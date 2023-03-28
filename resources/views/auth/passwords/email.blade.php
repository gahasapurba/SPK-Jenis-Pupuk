@extends('layouts.auth')
@section('title')
    Ubah Kata Sandi
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Ubah Kata Sandi</h1>
                    <p class="text-medium">Silahkan masukkan email yang anda pakai dalam mendaftarkan akun anda sebelumnya. Anda akan menerima email yang berisi tautan instruksi untuk mengubah kata sandi anda</p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/dashboard/images/auth/reset-password.svg') }}" alt="Reset Password 1" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/dashboard/images/auth/shape.svg') }}" alt="Reset Password 2" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Silahkan Ubah Kata Sandi</h6>
                <p class="text-sm mb-25">Masukkan email anda untuk dapat mengubah kata sandi</p>
                @if (session('status'))
                <div class="alert-box success-alert">
                    <div class="alert">
                        <p class="text-medium">{{ session('status') }}</p>
                    </div>
                </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Kirim Tautan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between flex-wrap pt-40">
                    <a href="{{ route('login') }}" class="hover-underline">Masuk</a>
                    <p>Masih belum memiliki akun? <a href="{{ route('register') }}" class="hover-underline">Buat akun</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection