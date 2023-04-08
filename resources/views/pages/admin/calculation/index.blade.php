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
                              <td>{{ number_format($col, 3, '.', '') }}</td>
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

    {{-- narmalisasi matrix terbobot --}}
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
                          <td>{{ $alternatif[$no]->name }}</td>
                          @foreach ($row as $col)
                              <td>{{ number_format($col, 3, '.', '') }}</td>
                          @endforeach
                      </tr>
                  @endforeach
                  <tr>
                    <td colspan="2"></td>
                    @foreach ($criterias as $crite)
                        @if ($crite->type == "Cost")
                            <td>MIN</td>
                        @else
                            <td>MAX</td>
                        @endif
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
    {{-- end normalisasi matrix terbobot --}}

    {{-- Nilai Memaksimalkan S+ --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Nilai Memaksimalkan S+ ( @foreach ($criterias as $crit)
                  @if ($crit->type == "Benefit")
                    {{ $crit->code }}
                  @endif
              @endforeach) </h6>
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
                  <th class="lead-info"><h6>Total</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($totolSPlus as $no => $row)
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $alternatif[$no]->name }}</td>
                          <td>{{ number_format($row, 3, '.', '') }}</td>
                      </tr>
                  @endforeach
                  <tr>
                  </tr>
                <!-- end table row -->
              </tbody>
            </table>
            <!-- end table -->
          </div>
        </div>
        <!-- end card -->
    </div>
    {{-- end Nilai Memaksimalkan S+ --}}

    {{-- Nilai Meminimalkan S- --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Nilai Memaksimalkan S- ( @foreach ($criterias as $crit)
                  @if ($crit->type == "Cost")
                    {{ $crit->code }}
                  @endif
              @endforeach) </h6>
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
                  <th class="lead-info"><h6>Total</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($totolSNegartif as $no => $row)
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $alternatif[$no]->name }}</td>
                          <td>{{ number_format($row, 3, '.', '') }}</td>
                      </tr>
                  @endforeach
                  <tr>
                  </tr>
                <!-- end table row -->
              </tbody>
            </table>
            <!-- end table -->
          </div>
        </div>
        <!-- end card -->
    </div>
    {{-- end Nilai Meminimalkan S-  --}}

    {{-- hitung bobot relatif --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Nilai Memaksimalkan S- ( @foreach ($criterias as $crit)
                  @if ($crit->type == "Cost")
                    {{ $crit->code }}
                  @endif
              @endforeach) </h6>
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
                  <th class="lead-info"><h6>1/S-<small>1</small></h6></th>
                  <th class="lead-info"><h6>S-<small>i</small> i=1m(1/S-<small>1</small>)</h6></th>
                  <th class="lead-info"><h6>i=1m S-<small>i</small> / S-<small>i</small> i=1m(1/S-<small>1</small>)</h6></th>
                  <th class="lead-info"><h6>S+<small>i</small> + i=1m S-<small>i</small> / S-<small>i</small> i=1m(1/S-<small>1</small>)</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($tahap1 as $no => $row)
                      <tr>
                          <td>{{ $no+1 }}</td>
                          <td>{{ $alternatif[$no]->name }}</td>
                          <td>{{ number_format($row, 0, '.', '') }}</td>
                          <td>{{ number_format($tahap2[$no], 3, '.', '') }}</td>
                          <td>{{ number_format($tahap3[$no], 3, '.', '') }}</td>
                          <td>{{ number_format($tahap4[$no], 3, '.', '') }}</td>
                      </tr>
                  @endforeach
                  <tr>
                    <td colspan="2">Total (1/S-<small>1</small>)</td>
                    <td>{{ $jumlah1SMin }}</td>
                    <td colspan="2">Q<small>max</small></td>
                    <td>{{ number_format($Qmax, 3, '.', '') }}</td>
                  </tr>
                <!-- end table row -->
              </tbody>
            </table>
            <!-- end table -->
          </div>
        </div>
        <!-- end card -->
    </div>
    {{-- end hitung bobot relatif --}}

    {{-- HITUNG UTILITAS KUANTITATIF --}}
    <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="kiri">
              <h6 class="mb-10">Nilai Utilitas Kuantitatif (Ui)</h6>
          </div>
          <p class="text-sm mb-20">
            {{-- text --}}
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th class="lead-email"><h6>Alternatif</h6></th>
                  <th class="lead-info"><h6>Hasil Ui</h6></th>
                  <th class="lead-info"><h6>Rank</h6></th>
                </tr>
                <!-- end table row-->
              </thead>
              <tbody>
                  @foreach ($utilital_kuanti as $no => $row)
                      <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ number_format($row->spk_results, 7, '.', '') }}</td>
                        <td>{{ $no+1 }}</td>
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
    {{-- END HITUNG UTILITAS KUANTITATIF --}}
    <!-- end col -->
</div>
@endsection

@section('modal')

@endsection
