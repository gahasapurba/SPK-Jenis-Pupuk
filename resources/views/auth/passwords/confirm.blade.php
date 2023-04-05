@extends('layouts.auth')
@section('title')
    Konfirmasi Kata Sandi
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Konfirmasi Kata Sandi</h1>
                    <p class="text-medium">Masukkan kata sandi akun anda terlebih dahulu untuk melanjutkan</p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/dashboard/images/auth/signin-image.svg') }}" alt="Confirm Password 1" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/dashboard/images/auth/shape.svg') }}" alt="Confirm Password 2" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Silahkan Masukkan Kata Sandi</h6>
                <p class="text-sm mb-25">Untuk dapat kembali masuk menggunakan akun anda</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                    <div class="row">
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
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Konfirmasi Kata Sandi</button>
                            </div>
                        </div>
                    </div>
                </form>
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