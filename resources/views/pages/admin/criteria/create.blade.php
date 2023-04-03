@extends('layouts.admin')
@section('title')
    Buat Kriteria
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Buat Kriteria</h6>
                <form action="{{ route('admin.criteria.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="code">Kode Kriteria</label>
                                <input type="text" name="code" placeholder="Masukkan Kode Kriteria" class="form-control bg-transparent @error('code') is-invalid @enderror" value="{{ old('code') }}" autofocus/>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="name">Nama Kriteria</label>
                                <input type="text" name="name" placeholder="Masukkan Nama Kriteria" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="weight">Bobot Kriteria</label>
                                <input type="number" min="0" step="0.01" name="weight" placeholder="Masukkan Bobot Kriteria" class="form-control bg-transparent @error('weight') is-invalid @enderror" value="{{ old('weight') }}"/>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="select-style-1">
                                <label for="type">Jenis Kriteria</label>
                                <select name="type" class="select2 form-control bg-transparent @error('type') is-invalid @enderror">
                                    <option value="">Pilih Jenis Kriteria</option>
                                    <option value="Benefit" @if(old('type') == "Benefit") selected @endif>Benefit</option>
                                    <option value="Cost" @if(old('type') == "Cost") selected @endif>Cost</option>
                                </select>
                                @error('type')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                    Buat Kriteria
                                </button>
                                <a href="{{ route('admin.criteria.index') }}" class="main-btn danger-btn-outline m-2">
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