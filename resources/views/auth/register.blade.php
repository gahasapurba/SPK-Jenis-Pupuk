@extends('layouts.auth')
@section('title')
    Registrasi
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Ayo Buat Akun Anda</h1>
                    <p class="text-medium">Silahkan buat akun anda terlebih dahulu untuk melanjutkan</p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/dashboard/images/auth/signin-image.svg') }}" alt="Sign Up 1" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/dashboard/images/auth/shape.svg') }}" alt="Sign Up 2" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signup-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Silahkan Buat Akun</h6>
                <p class="text-sm mb-25">Untuk memulai menentukan jenis pupuk yang paling tepat untuk tanaman anda</p>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="name">Nama</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" autofocus placeholder="Masukkan nama anda" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda" />
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
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Buat Akun</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="singup-option pt-40">
                    <p class="text-sm text-medium text-dark text-center">Sudah memiliki akun? <a href="{{ route('login') }}">Silahkan masuk</a></p>
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