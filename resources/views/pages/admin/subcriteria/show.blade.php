@extends('layouts.admin')
@section('title')
    Detail Subkriteria
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Detail Subkriteria</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="criteria_criterias_id">Kriteria</label>
                            <input type="text" name="criteria_criterias_id" class="bg-transparent" value="{{ $item->criteria->name }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="name">Nama Subkriteria</label>
                            <input type="text" name="name" class="bg-transparent" value="{{ $item->name }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="variable">Variabel Subkriteria</label>
                            <input type="text" name="variable" class="bg-transparent" value="{{ $item->variable }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="value">Nilai Subkriteria</label>
                            <input type="number" min="0" step="0.01" name="value" class="bg-transparent" value="{{ $item->value }}" readonly/>
                        </div>
                        <div class="input-style-1">
                            <label for="created_at">Dibuat Pada</label>
                            <input type="text" name="created_at" class="bg-transparent" value="{{ $item->created_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}" readonly/>
                        </div>
                        {{-- <div class="input-style-1">
                            <label for="updated_at">Diubah Pada</label>
                            <input type="text" name="updated_at" class="bg-transparent" value="{{ $item->updated_at->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}" readonly/>
                        </div> --}}
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <a href="{{ route('admin.subcriteria.index') }}" class="main-btn primary-btn-outline m-2">
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