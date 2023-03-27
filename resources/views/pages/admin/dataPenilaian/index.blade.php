@extends('layouts.admin')
@section('title')
    Data Penilaian
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card-style mb-30">
        <div class="kiri">
            <h6 class="mb-10">Data Penilaian</h6>
        </div>
        <p class="text-sm mb-20">
          {{-- text --}}
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <th class="lead-info"><h6>No</h6></th>
                <th class="lead-email"><h6>Alternatif</h6></th>
                <th class="lead-email"><h6>Curah Hujan</h6></th>
                <th class="lead-email"><h6>Kandungan N</h6></th>
                <th class="lead-email"><h6>Kandungan P</h6></th>
                <th class="lead-email"><h6>Kandungan K</h6></th>
                <th class="lead-email"><h6>Jenis Tanah</h6></th>
                <th class="lead-email"><h6>Harga/Kg</h6></th>
                <th><h6>Aksi</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              @foreach ($alternatif as $no => $alter)
                <tr>
                    <td class="min-width">
                        <p>{{ $no+1 }}</p>
                    </td>
                    <td class="min-width">
                        <p><a href="#0">{{ $alter->nama_alternatif }}</a></p>
                    </td>
                    <td>
                        @if ($alter->curah_hujan == null)
                            -
                        @else
                            {{ $alter->curah_hujan}}
                        @endif
                    </td>
                    <td>
                        @if ($alter->kandungan_n == null)
                            -
                        @else
                            {{ $alter->kandungan_n}}
                        @endif
                    </td>
                    <td>
                        @if ($alter->kandungan_p == null)
                            -
                        @else
                            {{ $alter->kandungan_p}}
                        @endif
                    </td>
                    <td>
                        @if ($alter->kandungan_k == null)
                            -
                        @else
                            {{ $alter->kandungan_k}}
                        @endif
                    </td>
                    <td>
                        @if ($alter->jenis_tanah == null)
                            -
                        @else
                            {{ $alter->jenis_tanah}}
                        @endif
                    </td>
                    <td>
                        @if ($alter->harga == null)
                            -
                        @else
                            {{ $alter->harga}}
                        @endif
                    </td>
                    <td>
                        <div class="action">
                            @if ($alter->harga == null)
                                <a href="{{ route('pagesAddPenilaian',$alter->id) }}" class="btn btn-success">
                                    <i class="lni lni-plus">Input</i>
                                </a>
                            @else
                                <a href="{{ route('pagesEditPenilaian',$alter->id) }}" class="btn btn-warning">
                                    <i class="lni lni-pencil-alt">Edit</i>
                                </a>
                            @endif
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

@endsection
