@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="row justify-content-center mb-30">
    <div class="col-lg-8">
        <div class="section-title text-center">
            <h2 class="mb-20">Selamat Datang di Website Sistem Pendukung Keputusan Jenis Pupuk Buatan Pada Pemupukan Dasar (Pemupukan Pertama)</h2>
            <p class="text-sm">Solusi yang tepat untuk menentukan jenis pupuk yang paling tepat untuk tanaman padi anda</p>
        </div>
    </div>
</div>
<div class="row">
    {{-- <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card icon-card-2 mb-30">
            <div class="d-flex align-items-center">
                <div class="icon primary">
                    <i class="lni lni-users"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Pengguna</h6>
                    <h3 class="text-bold mb-10">{{ $user_count }}</h3>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-4 col-lg-4 col-sm-12">
        <div class="icon-card icon-card-2 mb-30">
            <div class="d-flex align-items-center">
                <div class="icon primary">
                    <i class="lni lni-database"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Kriteria</h6>
                    <h3 class="text-bold mb-10">{{ $criteria_count }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-12">
        <div class="icon-card icon-card-2 mb-30">
            <div class="d-flex align-items-center">
                <div class="icon primary">
                    <i class="lni lni-tab"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Subkriteria</h6>
                    <h3 class="text-bold mb-10">{{ $subcriteria_count }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-12">
        <div class="icon-card icon-card-2 mb-30">
            <div class="d-flex align-items-center">
                <div class="icon primary">
                    <i class="lni lni-package"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Alternatif</h6>
                    <h3 class="text-bold mb-10">{{ $alternative_count }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection