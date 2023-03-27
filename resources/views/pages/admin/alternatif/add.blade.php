@extends('layouts.admin')
@section('title')
    Data Alternatif
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-25">Tambah Data Kriteria</h6>
            <hr>
            <form action="{{ route('addDataAlternatif') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label @error('nama_alternatif') class="text-danger" role="alert" @enderror> Nama Data Alternatif @error('nama_alternatif')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}" placeholder="Nama Data Alternatif" @error('nama_alternatif') class="aaa" @enderror>
                        </div>
                    </div>
                    <div class="col-sm-12">
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
        </div>
    </div>
</div>
@endsection

@section('modal')

@endsection
