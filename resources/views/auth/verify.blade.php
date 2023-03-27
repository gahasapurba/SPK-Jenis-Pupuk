@extends('layouts.auth')
@section('title')
    Verifikasi Email
@endsection
@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Verifikasi Email</h1>
                    <p class="text-medium">Verifikasi email anda terlebih dahulu untuk melanjutkan</p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/dashboard/images/auth/signin-image.svg') }}" alt="Verification 1" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/dashboard/images/auth/shape.svg') }}" alt="Verification 2" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Verifikasi Email Anda</h6>
                <p class="text-sm mb-25">Silahkan cek email anda. Link verifikasi telah kami kirimkan ke email yang anda masukkan sebelumnya. Jika anda belum menerimanya, silahkan klik tombol dibawah untuk mengirim ulang</p>
                @if (session('resent'))
                <div class="alert-box success-alert">
                    <div class="alert">
                        <p class="text-medium">Link verifikasi telah kami kirimkan ulang</p>
                    </div>
                </div>
                @endif
                <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">Kirim Ulang Link Verifikasi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection