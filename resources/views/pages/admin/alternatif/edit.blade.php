@extends('layouts.admin')
@section('title')
    Data Alternatif
@endsection
@section('content')
<div class="row">
    @if ($message = Session::get('warning'))
        <div class="alert-box warning-alert">
            <div class="alert kiri">
                <p class="text-medium">
                    {{ $message }}
                </p>
                <i class="lni lni-warning fs-4 fw-700"></i>
            </div>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-25">Edit Data Alternatif</h6>
            <hr>
            @foreach ($alternatif as $alter)
                <form action="{{ route('editAlternatif') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $alter->id }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label @error('nama_alternatif') class="text-danger" role="alert" @enderror> Nama Data Alternatif @error('nama_alternatif')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="text" name="nama_alternatif" @if (old('nama_alternatif'))
                                    value="{{ old('nama_alternatif') }}"
                                @else
                                    value="{{ $alter->nama_alternatif }}"
                                @endif placeholder="Kode Kriteria" @error('nama_alternatif') class="aaa" @enderror>
                            </div>
                        </div>
                    <!-- end col -->
                    <div class="col-12">
                    <div class="kiri">
                        <span></span>
                        <button type="submit" class="main-btn success-btn btn-hover m-2">
                        Simpan
                        </button>
                    </div>
                    </div>
                </div>
                <!-- end row -->
                </form>
            @endforeach
          </div>
    </div>
</div>
@endsection

@section('modal')

@endsection
