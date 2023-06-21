@extends('layouts.admin')
@section('title')
    Ubah Penilaian
@endsection
@section('content')
<div class="form-layout-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card-style mb-30">
                <h6 class="mb-25">Ubah Penilaian</h6>
                <form action="{{ route('admin.assessment.update', $hash->encodeHex($item->id)) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="name">Nama Alternatif</label>
                                <input type="text" name="name" class="bg-transparent" value="{{ $item->name }}" readonly/>
                            </div>
                            <div class="select-style-1">
                                <label for="soil_type">Jenis Tanah Alternatif</label>
                                <select name="soil_type" class="select2 form-control bg-transparent @error('soil_type') is-invalid @enderror">
                                    <option value="">Pilih Jenis Tanah Alternatif</option>
                                    @foreach ($soil_types as $soil_type)
                                        <option value="{{ $soil_type->name }}" @if($item->soil_type == $soil_type->name) selected @endif>{{ $soil_type->name }}</option>
                                    @endforeach
                                </select>
                                @error('soil_type')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="nitrogen">Kandungan N Alternatif</label>
                                <input type="number" min="0" step="0.01" name="nitrogen" placeholder="Masukkan Kandungan N Alternatif" class="form-control bg-transparent @error('nitrogen') is-invalid @enderror" value="{{ $item->nitrogen }}"/>
                                @error('nitrogen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="phosphor">Kandungan P Alternatif</label>
                                <input type="number" min="0" step="0.01" name="phosphor" placeholder="Masukkan Kandungan P Alternatif" class="form-control bg-transparent @error('phosphor') is-invalid @enderror" value="{{ $item->phosphor }}"/>
                                @error('phosphor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="kalium">Kandungan K Alternatif</label>
                                <input type="number" min="0" step="0.01" name="kalium" placeholder="Masukkan Kandungan K Alternatif" class="form-control bg-transparent @error('kalium') is-invalid @enderror" value="{{ $item->kalium }}"/>
                                @error('kalium')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-style-1">
                                <label for="price">Harga Alternatif</label>
                                <input type="number" min="0" step="0.01" name="price" placeholder="Masukkan Harga Alternatif" class="form-control bg-transparent @error('price') is-invalid @enderror" value="{{ $item->price }}"/>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                    Ubah Penilaian
                                </button>
                                <a href="{{ route('admin.assessment.index') }}" class="main-btn danger-btn-outline m-2">
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