@extends('layouts.dashboard')
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
              <tr>
                <td class="min-width">
                  <p>1</p>
                </td>
                <td class="min-width">
                  <p><a href="#0">C1</a></p>
                </td>
                <td class="min-width">
                    <p>Jenis Tanah</p>
                  </td>
                <td class="min-width">
                  <p>17%</p>
                </td>
                <td class="min-width">
                  <p>Benefit</p>
                </td>
                <td>
                  <div class="action">
                    <a href="{{ route('editDataKriteria') }}">
                        <button class="text-primary">
                            <i class="lni lni-pencil-alt"></i>
                          </button>
                    </a>
                    <button type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#ModalFour">
                        <i class="lni lni-trash-can"></i>
                      </button>
                  </div>
                </td>
              </tr>


              <tr>
                <td class="min-width">
                  <p>2</p>
                </td>
                <td class="min-width">
                  <p><a href="#0">C2</a></p>
                </td>
                <td class="min-width">
                    <p>Curah Hujan</p>
                  </td>
                <td class="min-width">
                  <p>13%</p>
                </td>
                <td class="min-width">
                  <p>Benefit</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-primary">
                        <i class="lni lni-pencil-alt"></i>
                      </button>
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="min-width">
                  <p>3</p>
                </td>
                <td class="min-width">
                  <p><a href="#0">C3</a></p>
                </td>
                <td class="min-width">
                    <p>Kandungan P</p>
                  </td>
                <td class="min-width">
                  <p>30%</p>
                </td>
                <td class="min-width">
                  <p>Benefit</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-primary">
                        <i class="lni lni-pencil-alt"></i>
                      </button>
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
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
<div class="warning-modal">
    <div class="modal fade" id="ModalFour" tabindex="-1" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('hapusDataKriteria') }}">
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
                    <button data-bs-dismiss="modal" class="main-btn success-btn-outline btn-hover m-1">
                      Cancel
                    </button>
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
@endsection
