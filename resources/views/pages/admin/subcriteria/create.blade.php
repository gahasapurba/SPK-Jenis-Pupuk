@extends('layouts.admin')
@section('title')
    Buat Subkriteria
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Buat Subkriteria</h6>
                <form action="{{ route('admin.subcriteria.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="select-style-1">
                                <label for="criteria_criterias_id">Kriteria</label>
                                <select name="criteria_criterias_id" class="select2 form-control bg-transparent @error('criteria_criterias_id') is-invalid @enderror" autofocus>
                                    <option value="">Pilih Kriteria</option>
                                    @foreach ($criterias as $criteria)
                                        <option value="{{ $hash->encodeHex($criteria->id) }}" @if(old('criteria_criterias_id') == $hash->encodeHex($criteria->id)) selected @endif>{{ $criteria->name }}</option>
                                    @endforeach
                                </select>
                                @error('criteria_criterias_id')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="name">Nama Subkriteria</label>
                                <input type="text" name="name" placeholder="Masukkan Nama Subkriteria" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="select-style-1">
                                <label for="variable">Variabel Subkriteria</label>
                                <select name="variable" class="select2 form-control bg-transparent @error('variable') is-invalid @enderror">
                                    <option value="">Pilih Variabel Subkriteria</option>
                                    <option value="Sangat Rendah" @if(old('variable') == "Sangat Rendah") selected @endif>Sangat Rendah</option>
                                    <option value="Rendah" @if(old('variable') == "Rendah") selected @endif>Rendah</option>
                                    <option value="Sedang" @if(old('variable') == "Sedang") selected @endif>Sedang</option>
                                    <option value="Tinggi" @if(old('variable') == "Tinggi") selected @endif>Tinggi</option>
                                    <option value="Sangat Tinggi" @if(old('variable') == "Sangat Tinggi") selected @endif>Sangat Tinggi</option>
                                </select>
                                @error('variable')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="value">Nilai Subkriteria</label>
                                <input type="number" min="0" step="0.01" name="value" placeholder="Masukkan Nilai Subkriteria" class="form-control bg-transparent @error('value') is-invalid @enderror" value="{{ old('value') }}"/>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                    Buat Subkriteria
                                </button>
                                <a href="{{ route('admin.subcriteria.index') }}" class="main-btn danger-btn-outline m-2">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection