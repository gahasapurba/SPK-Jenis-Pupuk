@extends('layouts.admin')
@section('title')
    Data Subkriteria
@endsection
@section('content')
    {{-- notofikasi success--}}
    @if ($message = Session::get('success'))
    <div class="alert-box success-alert">
        <div class="alert kiri">
            <p class="text-medium">
                {{ $message }}
            </p>
            <i class="lni lni-checkmark-circle fs-4 fw-700"></i>
        </div>
    </div>
    @endif

    {{-- notifikasi warning --}}
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

    @foreach ($kriteria as $krit)
        <div class="row">
            <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="kiri">
                    <h6 class="mb-10">{{ $krit->nama_kriteria }}</h6>
                    <button type="button" class="main-btn btn-sm success-btn btn-hover" data-bs-toggle="modal" data-bs-target="#ModalThree{{ $krit->id }}">
                        <i class="lni lni-circle-plus"></i> Tambah Data
                      </button>
                </div>
                <p class="text-sm mb-20">
                {{-- text --}}
                </p>
                <div class="table-wrapper table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th class="lead-info"><h6>No</h6></th>
                        <th class="lead-email"><h6>Nama Subkriteria</h6></th>
                        <th class="lead-email"><h6>Variabel</h6></th>
                        <th class="lead-phone"><h6>Nilai</h6></th>
                        <th><h6>Aksi</h6></th>
                    </tr>
                    <!-- end table row-->
                    </thead>
                    <tbody>
                    @foreach ($subkriteria as $no => $subKriter)
                        @if ($krit->id == $subKriter->kriteria_id)
                            <tr>
                                <td class="min-width">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td class="min-width">
                                    <p><a href="#0">{{ $subKriter->nama_subkriteria }}</a></p>
                                </td>
                                <td class="min-width">
                                    <p>{{ $subKriter->variabel }}</p>
                                </td>
                                <td class="min-width">
                                <p>{{ $subKriter->nilai }}</p>
                                </td>
                                <td>
                                <div class="action">
                                    <button type="button" class="text-primary"  data-bs-toggle="modal" data-bs-target="#ModalOne{{ $subKriter->id }}">
                                        <i class="lni lni-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#ModalFour{{ $subKriter->id }}">
                                        <i class="lni lni-trash-can"></i>
                                    </button>
                                </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->
                </div>
            </div>
            <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    @endforeach
@endsection

@section('modal')
    {{-- modal menambahkan subkriteria --}}
    @foreach ($kriteria as $krit)
        <div class="warning-modal">
            <div class="modal fade" id="ModalThree{{ $krit->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content card-style">
                <div class="modal-header px-0 border-0">
                    <h5 class="text-bold">Tambah Subkriteria {{ $krit->nama_kriteria }}</h5>
                    <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
                    <i class="lni lni-cross-circle"></i>
                    </button>
                </div>
                <form action="{{ route('addSubriteria') }}" method="POST">
                    <div class="modal-body px-0">
                        <div class="content mb-30">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id_kriteria" value="{{ $krit->id }}">
                                    <div class="col-sm-12">
                                        <div class="input-style-1">
                                            <label @error('nama_subkriteria') class="text-danger" role="alert" @enderror> Nama Subkriteria @error('nama_subkriteria')
                                                | {{ $message }}
                                            @enderror
                                            </label>
                                            <input type="text" name="nama_subkriteria" value="{{ old('nama_subkriteria') }}" placeholder="Nama Subkriteria" @error('nama_subkriteria') class="aaa" @enderror>
                                        </div>
                                        <div class="input-style-1">
                                            <label @error('variabel') class="text-danger" role="alert" @enderror> Variabel @error('variabel')
                                                | {{ $message }}
                                            @enderror
                                            </label>
                                            <select name="variabel" class="form-control light-bg @error('variabel') aaa @enderror">
                                                <option value="">-- Pilih Variabel --</option>
                                                <option value="Sangat Rendah">Sangat Rendah</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Tinggi">Tinggi</option>
                                                <option value="Sangat Tinggi">Sangat Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="input-style-1">
                                            <label @error('nilai') class="text-danger" role="alert" @enderror> Nilai @error('nilai')
                                                | {{ $message }}
                                            @enderror
                                            </label>
                                            <input type="text" name="nilai" value="{{ old('nilai') }}" placeholder="Nilai" @error('nilai') class="aaa" @enderror>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="action d-flex flex-wrap justify-content-end">
                        <button type="submit" class="main-btn success-btn-outline btn-hover m-1">
                            Tambah
                        </button>
                    </div>
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach

    {{-- modal edit subkriteria --}}
    @foreach ($subkriteria as $subKrit)
        <div class="warning-modal">
            <div class="modal fade" id="ModalOne{{ $subKrit->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content card-style">
                <div class="modal-header px-0 border-0">
                    <h5 class="text-bold">Edit Subkriteria {{ $subKrit->nama_kriteria }}</h5>
                    <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
                    <i class="lni lni-cross-circle"></i>
                    </button>
                </div>
                <form action="{{ route('editSubkriteria') }}" method="POST">
                    <div class="modal-body px-0">
                        <div class="content mb-30">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $subKrit->id }}">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="input-style-1">
                                                <label @error('nama_subkriteria') class="text-danger" role="alert" @enderror> Nama Subkriteria @error('nama_subkriteria')
                                                    | {{ $message }}
                                                @enderror
                                                </label>
                                                <input type="text" name="nama_subkriteria" @if (old('nama_subkriteria'))
                                                    value="{{ old('nama_subkriteria') }}"
                                                @else
                                                    value="{{ $subKrit->nama_subkriteria }}"
                                                @endif placeholder="Kode Kriteria" @error('nama_subkriteria') class="aaa" @enderror>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="select-style-1">
                                                    <label @error('variabel') class="text-danger" role="alert" @enderror> Variabel @error('variabel')
                                                        | {{ $message }}
                                                    @enderror
                                                    </label>
                                                    <div class="select-position">
                                                    <select name="variabel" class="light-bg @error('variabel') aaa @enderror">
                                                        <option value="{{ $subKrit->variabel }}">{{ $subKrit->variabel }}</option>
                                                        @if ($subKrit->variabel == "Sangat Rendah")
                                                            <option value="Rendah">Rendah</option>
                                                            <option value="Sedang">Sedang</option>
                                                            <option value="Tinggi">Tinggi</option>
                                                            <option value="Sangat Tinggi">Sangat Tinggi</option>
                                                        @elseif ($subKrit->variabel == "Rendah")
                                                            <option value="Sangat Rendah">Sangat Rendah</option>
                                                            <option value="Sedang">Sedang</option>
                                                            <option value="Tinggi">Tinggi</option>
                                                            <option value="Sangat Tinggi">Sangat Tinggi</option>
                                                        @elseif ($subKrit->variabel == "Sedang")
                                                            <option value="Sangat Rendah">Sangat Rendah</option>
                                                            <option value="Rendah">Rendah</option>
                                                            <option value="Tinggi">Tinggi</option>
                                                            <option value="Sangat Tinggi">Sangat Tinggi</option>
                                                        @elseif ($subKrit->variabel == "Tinggi")
                                                            <option value="Sangat Rendah">Sangat Rendah</option>
                                                            <option value="Rendah">Rendah</option>
                                                            <option value="Sedang">Sedang</option>
                                                            <option value="Sangat Tinggi">Sangat Tinggi</option>
                                                        @elseif ($subKrit->variabel == "Tinggi")
                                                            <option value="Sangat Rendah">Sangat Rendah</option>
                                                            <option value="Rendah">Rendah</option>
                                                            <option value="Sedang">Sedang</option>
                                                            <option value="Tinggi">Tinggi</option>
                                                        @endif

                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-style-1">
                                                <label @error('nilai') class="text-danger" role="alert" @enderror> Nilai @error('nilai')
                                                    | {{ $message }}
                                                @enderror
                                                </label>
                                                <input type="text" name="nilai" @if (old('nilai'))
                                                    value="{{ old('nilai') }}"
                                                @else
                                                    value="{{ $subKrit->nilai }}"
                                                @endif placeholder="Kode Kriteria" @error('nilai') class="aaa" @enderror>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="action d-flex flex-wrap justify-content-end">
                        <button type="submit" class="main-btn success-btn-outline btn-hover m-1">
                            Simpan
                        </button>
                    </div>
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach

{{-- modal untuk hapus subkriteria --}}
@foreach ($subkriteria as $subKrit )
    <div class="warning-modal">
        <div class="modal fade" id="ModalFour{{ $subKrit->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('hapusSubkriteria') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subKrit->id }}">
                    <div class="modal-content card-style">
                        <div class="modal-header px-0 border-0">
                        <h5 class="text-bold">
                            <i class="lni lni-warning text-danger me-2"></i> Hapus Data?
                        </h5>
                        </div>
                        <div class="modal-body px-0">
                        <div class="content mb-30">
                            <p class="text-sm">
                            Yakin ingin menghapus? Jika sudah dihapus data akan langsung hilang
                            </p>
                        </div>
                        <div class="action d-flex flex-wrap justify-content-end">
                            <button type="submit" data-bs-dismiss="modal" class="main-btn danger-btn-outline btn-hover m-1">
                            Hapus
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
