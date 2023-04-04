@extends('layouts.admin')
@section('title')
    Detail Pengguna
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="client-profile-wrapper mb-30">
            <div class="client-cover">
                <img src="{{ asset('assets/dashboard/images/clients/clients-cover.png') }}" alt="Profile Cover"/>
            </div>
            <div class="client-profile-photo">
                <div class="image">
                    @if (Str::startsWith(Auth::user()->avatar, 'upload/avatar/'))
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Profile Photo" />
                    @elseif (!Auth::user()->avatar)
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile Photo" />
                    @else
                        <img src="{{ Auth::user()->avatar }}" alt="Profile Photo" />
                    @endif
                </div>
                <div class="profile-meta text-center pt-25">
                    <h5 class="text-bold mb-10">{{ $item->name }}</h5>
                    <p class="text-sm">{{ $item->email }}</p>
                    <br>
                    @if ($item->email_verified_at)
                        <span class="status-btn success-btn">Pengguna Terverifikasi</span>
                    @else
                        <span class="status-btn warning-btn">Pengguna Belum Terverifikasi</span>
                    @endif
                </div>
            </div>
            <div class="client-info">
                <h5 class="text-bold mb-15">Waktu Pendaftaran</h5>
                <p class="text-sm mb-20">{{ $item->created_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}</p>
                <h5 class="text-bold mb-15">Waktu Perubahan Profil Terakhir</h5>
                <p class="text-sm text-medium mb-20">{{ $item->updated_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="button-group d-flex justify-content-center flex-wrap">
            <a href="{{ route('admin.user.index') }}" class="main-btn primary-btn-outline m-2">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection