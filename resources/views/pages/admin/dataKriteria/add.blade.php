@extends('layouts.admin')
@section('title')
    Data Kriteria
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-25">Tambah Data Kriteria</h6>
                <hr>
                <form action="{{ route('tambahDataKriteria') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('cd_kriteria') class="text-danger" role="alert" @enderror> Kode Kriteria @error('cd_kriteria')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="text" name="cd_kriteria" value="{{ old('cd_kriteria') }}" placeholder="Kode Kriteria" @error('cd_kriteria') class="aaa" @enderror>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('nama_kriteria') class="text-danger" role="alert" @enderror> Nama Kriteria @error('nama_kriteria')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="text" value="{{ old('nama_kriteria') }}" name="nama_kriteria" placeholder="Nama Kriteria" @error('nama_kriteria') class="aaa" @enderror>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('bobot') class="text-danger" role="alert" @enderror> Bobot @error('bobot')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="number" value="{{ old('bobot') }}" name="bobot" placeholder="Bobot Kriteria"  @error('bobot') class="aaa" @enderror>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="select-style-1">
                            <label @error('jenis') class="text-danger" role="alert" @enderror> Jenis Kriteria @error('jenis')
                                | {{ $message }}
                            @enderror
                            </label>
                            <div class="select-position">
                            <select name="jenis" class="light-bg @error('jenis') aaa @enderror">
                                <option value="">-- Pilih Jenis Kriteria --</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
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
