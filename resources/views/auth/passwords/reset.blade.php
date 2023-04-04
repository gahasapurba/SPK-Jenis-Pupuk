@extends('layouts.auth')
@section('title')
    Ubah Kata Sandi (Buat Kata Sandi Baru)
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Buat Kata Sandi Baru</h1>
                    <p class="text-medium">Silahkan buat kata sandi baru untuk akun anda untuk melanjutkan</p>
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
        <div class="signup-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Silahkan Buat Kata Sandi Baru</h6>
                <p class="text-sm mb-25">Buat kata sandi baru yang menurut anda kuat dan mudah diingat untuk akun anda</p>
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                    <div class="row">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Masukkan email anda" />
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
                        <div class="col-12">
                            <div class="form-check checkbox-style mb-30">
                                <input class="form-check-input" type="checkbox" id="show_password" name="show_password" onclick="myFunction1()" />
                                <label class="form-check-label" for="show_password">Tampilkan kata sandi</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password-confirm">Konfirmasi Kata Sandi</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password-confirm" name="password_confirmation" placeholder="Masukkan ulang kata sandi anda" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check checkbox-style mb-30">
                                <input class="form-check-input" type="checkbox" id="show_password_confirmation" name="show_password_confirmation" onclick="myFunction2()" />
                                <label class="form-check-label" for="show_password_confirmation">Tampilkan konfirmasi kata sandi</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Ubah Kata Sandi</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="singup-option pt-40">
                @if(Auth::check() && Auth::user()->hasVerifiedEmail())
                    <p class="text-sm text-medium text-dark text-center"><a href="{{ route('dashboard.user.index') }}">Batal</a></p>
                @else
                    <p class="text-sm text-medium text-dark text-center">Sudah mengingat kembali kata sandi anda? <a href="{{ route('login') }}">Silahkan masuk</a></p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    function myFunction1() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function myFunction2() {
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush