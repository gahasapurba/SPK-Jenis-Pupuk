@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4 col-sm-6">
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
    </div>
    <div class="col-xl-3 col-lg-4 col-sm-6">
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
    <div class="col-xl-3 col-lg-4 col-sm-6">
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
    <div class="col-xl-3 col-lg-4 col-sm-6">
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