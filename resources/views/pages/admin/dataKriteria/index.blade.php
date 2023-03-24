@extends('layouts.admin')
@section('title')
    Data Kriteria
@endsection
@section('content')

{{-- notofikasi --}}
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

<div class="row">
    <div class="col-lg-12">
      <div class="card-style mb-30">
        <div class="kiri">
            <h6 class="mb-10">Data Kriteria</h6>
            <a href="{{ route('addDataKriteria') }}" class="btn btn-success">
                <i class="lni lni-circle-plus"></i>
                Tambah Data
            </a>
        </div>
        <p class="text-sm mb-20">
          {{-- text --}}
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <th class="lead-info"><h6>No</h6></th>
                <th class="lead-email"><h6>Kode Kriteria</h6></th>
                <th class="lead-email"><h6>Nama Kriteria</h6></th>
                <th class="lead-phone"><h6>Bobot</h6></th>
                <th class="lead-company"><h6>Jenis</h6></th>
                <th><h6>Aksi</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              @foreach ($kriteria as $no => $kriter)
                <tr>
                    <td class="min-width">
                        <p>{{ $no+1 }}</p>
                    </td>
                    <td class="min-width">
                    <p><a href="#0">{{ $kriter->cd_kriteria }}</a></p>
                    </td>
                    <td class="min-width">
                        <p>{{ $kriter->nama_kriteria }}</p>
                    </td>
                    <td class="min-width">
                    <p>{{ $kriter->bobot }}</p>
                    </td>
                    <td class="min-width">
                    <p>{{ $kriter->jenis }}</p>
                    </td>
                    <td>
                    <div class="action">
                        <a href="{{ route('editDataKriteria',$kriter->id) }}">
                            <button class="text-primary">
                                <i class="lni lni-pencil-alt"></i>
                            </button>
                        </a>
                        <button type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#ModalFour{{ $kriter->id }}">
                            <i class="lni lni-trash-can"></i>
                        </button>
                    </div>
                    </td>
                </tr>
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
@endsection

@section('modal')
@foreach ($kriteria as $kriter )
    <div class="warning-modal">
        <div class="modal fade" id="ModalFour{{ $kriter->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('hapusDataKriteria') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $kriter->id }}">
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
