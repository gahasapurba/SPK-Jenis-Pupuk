@extends('layouts.admin')
@section('title')
    Data Perhitugan
@endsection
@section('content')
<div class="row">
    {{-- Fuzifikasi --}}
    <div class="col-lg-12">
      <div class="card-style mb-30">
        <div class="kiri">
            <h6 class="mb-10">Data Perhitungan</h6>
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
                <th class="lead-email"><h6>C1</h6></th>
                <th class="lead-email"><h6>C2</h6></th>
                <th class="lead-email"><h6>C3</h6></th>
                <th class="lead-email"><h6>C4</h6></th>
                <th class="lead-email"><h6>C5</h6></th>
                <th class="lead-email"><h6>C6</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
                @foreach ($matrix as $no => $row)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $alternatif[$no]->nama_alternatif }}</td>
                        @foreach ($row as $col)
                            <td>{{ $col }}</td>
                        @endforeach
                    </tr>
                @endforeach
                <tr style="background: rgb(187, 187, 187);">
                    <td colspan="2">Total</td>
                    @foreach ($totalTiapColom as $tsp)
                        <td>{{$tsp}}</td>
                    @endforeach
                </tr>
              <!-- end table row -->
            </tbody>
          </table>
          <!-- end table -->
        </div>
      </div>
      <!-- end card -->
    </div>
    {{-- end fuzifikasi --}}

    {{-- normalisasi matriks --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Normalisasi Matrix</h6>
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
                  <th class="lead-email"><h6>C1</h6></th>
                  <th class="lead-email"><h6>C2</h6></th>
                  <th class="lead-email"><h6>C3</h6></th>
                  <th class="lead-email"><h6>C4</h6></th>
                  <th class="lead-email"><h6>C5</h6></th>
                  <th class="lead-email"><h6>C6</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($normalisasiMatriks as $no => $row)
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $alternatif[$no]->nama_alternatif }}</td>
                          @foreach ($row as $col)
                              <td>{{$col }}</td>
                          @endforeach
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
    {{-- end normalisai matriks --}}

    {{-- bobot kriteria --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Bobot Kriteria</h6>
          </div>
          <p class="text-sm mb-20">
            {{-- text --}}
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  @foreach ($kriteria as $krite)
                    <th class="lead-email"><h6>{{ $krite->cd_kriteria }}</h6></th>
                  @endforeach
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                    <tr>
                        @foreach ($kriteria as $krite)
                            <td>{{ $krite->bobot/100 }}</td>
                        @endforeach
                    </tr>
                <!-- end table row -->
              </tbody>
            </table>
            <!-- end table -->
          </div>
        </div>
        <!-- end card -->
    </div>
    {{-- end boot kriteria --}}

    {{-- normalisasi matriks terbobot --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Matrix Keputusan Berbobot Yang Ternormalisasi</h6>
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
                  <th class="lead-email"><h6>C1</h6></th>
                  <th class="lead-email"><h6>C2</h6></th>
                  <th class="lead-email"><h6>C3</h6></th>
                  <th class="lead-email"><h6>C4</h6></th>
                  <th class="lead-email"><h6>C5</h6></th>
                  <th class="lead-email"><h6>C6</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($normalisasiMatriksTerbobot as $no => $row)
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $alternatif[$no]->nama_alternatif }}</td>
                          @foreach ($row as $col)
                              <td>{{ $col }}</td>
                          @endforeach
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
    {{-- end normalisasi matriks terbobot --}}

    <!-- end col -->
</div>
@endsection

@section('modal')

@endsection
