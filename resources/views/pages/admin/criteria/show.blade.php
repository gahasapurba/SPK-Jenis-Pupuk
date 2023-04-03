@extends('layouts.admin')
@section('title')
    Detail Kriteria
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Detail Kriteria</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="code">Kode Kriteria</label>
                            <input type="text" name="code" class="bg-transparent" value="{{ $item->code }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="name">Nama Kriteria</label>
                            <input type="text" name="name" class="bg-transparent" value="{{ $item->name }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="weight">Bobot Kriteria</label>
                            <input type="number" min="0" step="0.01" name="weight" class="bg-transparent" value="{{ $item->weight }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="type">Tipe Kriteria</label>
                            @if ($item->type == "Benefit")
                                <span class="status-btn success-btn">Benefit</span>
                            @elseif ($item->type == "Cost")
                                <span class="status-btn danger-btn">Cost</span>
                            @else
                                <span class="status-btn primary-btn"></span>
                            @endif
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
                            <a href="{{ route('admin.criteria.index') }}" class="main-btn primary-btn-outline m-2">
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