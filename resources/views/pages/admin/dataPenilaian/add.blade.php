@extends('layouts.admin')
@section('title')
    Data Penilaian
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-25">Tambah Data Penilaian</h6>
            <hr>
            <form action="{{ route('editPenilaian') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('nama_alternatif') class="text-danger" role="alert" @enderror> Nama Data Alternatif @error('nama_alternatif')
                                | {{ $message }}
                            @enderror
                            </label>
                            @foreach ($alternatif as $alter)
                                <input type="hidden" name="id" value="{{ $alter->id }}">
                                <input type="text" name="nama_alternatif" readonly value="{{ $alter->nama_alternatif }}" placeholder="Nama Data Alternatif" @error('nama_alternatif') class="aaa" @enderror>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('curah_hujan') class="text-danger" role="alert" @enderror> Curah Hujan @error('curah_hujan')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="number" name="curah_hujan" value="{{ old('curah_hujan') }}" placeholder="Curah Hujan" @error('curah_hujan') class="aaa" @enderror>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('kandungan_p') class="text-danger" role="alert" @enderror> Kandungan P @error('kandungan_p')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="number" name="kandungan_p" value="{{ old('kandungan_p') }}" placeholder="Kandungan P" @error('kandungan_p') class="aaa" @enderror>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('jenis_tanah') class="text-danger" role="alert" @enderror> Jenis Tanah @error('jenis_tanah')
                                | {{ $message }}
                            @enderror
                            </label>
                            <select name="jenis_tanah" class="form-control light-bg @error('jenis_tanah') aaa @enderror">
                                <option value="">-- Pilih Jenis Tanah --</option>
                                @foreach ($jenis_tanah as $jst)
                                    <option value="{{ $jst->nama_subkriteria }}">{{ $jst->nama_subkriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('kandungan_k') class="text-danger" role="alert" @enderror> Kandungan K @error('kandungan_k')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="number" name="kandungan_k" value="{{ old('kandungan_k') }}" placeholder="Kandungan K" @error('kandungan_k') class="aaa" @enderror>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('kandungan_n') class="text-danger" role="alert" @enderror> Kandungan N @error('kandungan_n')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="number" name="kandungan_n" value="{{ old('kandungan_n') }}" placeholder="Kandungan N" @error('kandungan_n') class="aaa" @enderror>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label @error('harga') class="text-danger" role="alert" @enderror> Harga/Kg @error('harga')
                                | {{ $message }}
                            @enderror
                            </label>
                            <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Harga/Kg" @error('harga') class="aaa" @enderror>
                        </div>
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
        </div>
    </div>
</div>
@endsection

@section('modal')

@endsection
