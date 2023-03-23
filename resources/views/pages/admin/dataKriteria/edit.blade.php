@extends('layouts.admin')
@section('title')
    Data Kriteria
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-25">Edit Data Kriteria</h6>
            <hr>
            <form action="{{ route('ubahDataKriteria') }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Kode Kriteria</label>
                            <input type="text" placeholder="Kode Kriteria">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Nama Kriteria</label>
                            <input type="text" placeholder="Nama Kriteria">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Bobot Kriteria</label>
                            <input type="text" placeholder="Bobot Kriteria">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="select-style-1">
                        <label>Jenis Kriteria</label>
                        <div class="select-position">
                        <select class="light-bg">
                            <option value="">-- Pilih Jenis Kriteria --</option>
                            <option value="">Benefit</option>
                            <option value="">Cost</option>
                        </select>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div class="kiri">
                    <span></span>
                    <button class="main-btn success-btn btn-hover m-2">
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
