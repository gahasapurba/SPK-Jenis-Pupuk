@extends('layouts.admin')
@section('title')
    Detail Penilaian
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Detail Penilaian</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">Nama Alternatif</label>
                            <input type="text" name="name" class="bg-transparent" value="{{ $item->name }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="rainfall">Curah Hujan Alternatif</label>
                            <input type="number" min="0" step="0.01" name="rainfall" class="bg-transparent" value="{{ $item->rainfall }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="soil_type">Jenis Tanah Alternatif</label>
                            <input type="text" name="soil_type" class="bg-transparent" value="{{ $item->soil_type }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="nitrogen">Kandungan N Alternatif</label>
                            <input type="number" min="0" step="0.01" name="nitrogen" class="bg-transparent" value="{{ $item->nitrogen }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="phosphor">Kandungan P Alternatif</label>
                            <input type="number" min="0" step="0.01" name="phosphor" class="bg-transparent" value="{{ $item->phosphor }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="kalium">Kandungan K Alternatif</label>
                            <input type="number" min="0" step="0.01" name="kalium" class="bg-transparent" value="{{ $item->kalium }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="price">Harga Alternatif</label>
                            <input type="number" min="0" step="0.01" name="price" class="bg-transparent" value="{{ $item->price }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="created_at">Dibuat Pada</label>
                            <input type="text" name="created_at" class="bg-transparent" value="{{ $item->created_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="updated_at">Diubah Pada</label>
                            <input type="text" name="updated_at" class="bg-transparent" value="{{ $item->updated_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}" readonly/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <a href="{{ route('admin.assessment.index') }}" class="main-btn primary-btn-outline m-2">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection