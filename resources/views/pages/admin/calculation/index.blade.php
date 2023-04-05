@extends('layouts.admin')
@section('title')
    Data Perhitugan
@endsection
@section('content')
<div class="row">
    {{-- fuzifikasi --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Matrix Perhitungan</h6>
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
                          <td>{{ $alternatif[$no]->name }}</td>
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

    {{-- Normalisasi matrix --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Normalisasi Matrix X</h6>
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
                          <td>{{ $alternatif[$no]->name }}</td>
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
    {{-- end normalisasi matriks --}}

    {{-- Bobot Kriteria --}}
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
                  @foreach ($criterias as $alter)
                    <th class="lead-email"><h6>{{ $alter->code }}</h6></th>
                  @endforeach
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                    <tr>
                        @foreach ($criterias as $criter)
                            <td>{{ $criter->weight }}</td>
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
    {{-- end Kriteria --}}
    <!-- end col -->
</div>
@endsection

@section('modal')

@endsection
