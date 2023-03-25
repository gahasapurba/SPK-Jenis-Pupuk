@extends('layouts.admin')
@section('title')
    Data Kriteria
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
            <h6 class="mb-25">Edit Data Kriteria</h6>
            <hr>
            @foreach ($kriteriaId as $kritId)
                <form action="{{ route('ubahDataKriteria') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $kritId->id }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('cd_kriteria') class="text-danger" role="alert" @enderror> Kode Kriteria @error('cd_kriteria')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="text" name="cd_kriteria" readonly @if (old('cd_kriteria'))
                                    value="{{ old('cd_kriteria') }}"
                                @else
                                    value="{{ $kritId->cd_kriteria }}"
                                @endif placeholder="Kode Kriteria" @error('cd_kriteria') class="aaa" @enderror>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('nama_kriteria') class="text-danger" role="alert" @enderror> Nama Kriteria @error('nama_kriteria')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" @error('nama_kriteria') class="aaa" @enderror @if (old('nama_kriteria'))
                                    value="{{ old('nama_kriteria') }}"
                                    @else
                                    value="{{ $kritId->nama_kriteria }}"
                                @endif>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label @error('bobot') class="text-danger" role="alert" @enderror> Bobot @error('bobot')
                                    | {{ $message }}
                                @enderror
                                </label>
                                <input type="number" name="bobot" placeholder="Bobot Kriteria"  @error('bobot') class="aaa" @enderror @if (old('bobot'))
                                value="{{ old('bobot') }}"
                                @else
                                value="{{ $kritId->bobot }}"
                                @endif>
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
                                    @if ($kritId->jenis == "benefit")
                                        <option value="benefit">Benefit</option>
                                        <option value="cost">Cost</option>
                                    @else
                                        <option value="cost">Cost</option>
                                        <option value="benefit">Benefit</option>
                                    @endif

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
            @endforeach
          </div>
    </div>
</div>
@endsection

@section('modal')

@endsection
