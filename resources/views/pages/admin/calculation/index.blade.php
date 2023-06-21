@extends('layouts.admin')
@section('title')
    Daftar Perhitungan
@endsection
@section('content')
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Matriks Perhitungan</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C1</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C2</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C3</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C4</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C5</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrix as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                @foreach ($row as $col)
                                <td class="text-center">
                                    <p>{{ $col }}</p>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Normalisasi Matriks</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C1</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C2</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C3</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C4</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C5</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalisasiMatriks as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                @foreach ($row as $col)
                                <td class="text-center">
                                    <p>{{ number_format($col, 3, '.', '') }}</p>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Bobot Kriteria</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach ($criterias as $alter)
                                    <th class="text-center">
                                        <h6>{{ $alter->code }}</h6>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($criterias as $criter)
                                <td class="text-center">
                                    <p>{{ $criter->weight }}</p>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Matriks Keputusan Berbobot Yang Ternormalisasi</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C1</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C2</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C3</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C4</h6>
                                </th>
                                <th class="text-center">
                                    <h6>C5</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalisasiMatriksTerbobot as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                @foreach ($row as $col)
                                <td class="text-center">
                                    <p>{{ number_format($col, 3, '.', '') }}</p>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach ($criterias as $crite)
                                <th class="text-center">
                                    <h6>{{ $crite->code }}</h6>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($criterias as $crite)
                                @if ($crite->type == "Cost")
                                <td class="text-center">
                                    <p>MIN</p>
                                </td>
                                @else
                                <td class="text-center">
                                    <p>MAX</p>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Nilai Memaksimalkan S+ (@foreach ($criterias as $crit) @if($crit->type == "Benefit") {{ $crit->code }} @endif @endforeach)</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Total</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totalSPlus as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($row, 3, '.', '') }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Nilai Meminimalkan S- (@foreach ($criterias as $crit) @if($crit->type == "Cost") {{ $crit->code }} @endif @endforeach)</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Total</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totalSNegatif as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($row, 3, '.', '') }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Penghitungan Bobot Relatif</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>No</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>1/S-<small>1</small></h6>
                                </th>
                                <th class="text-center">
                                    <h6>S-<small>i</small> i=1m(1/S-<small>1</small>)</h6>
                                </th>
                                <th class="text-center">
                                    <h6>i=1m S-<small>i</small> / S-<small>i</small> i=1m(1/S-<small>1</small>)</h6>
                                </th>
                                <th class="text-center">
                                    <h6>S+<small>i</small> + i=1m S-<small>i</small> / S-<small>i</small> i=1m(1/S-<small>1</small>)</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahap1 as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $alternatives[$no]->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($row, 0, '.', '') }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($tahap2[$no], 3, '.', '') }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($tahap3[$no], 3, '.', '') }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($tahap4[$no], 3, '.', '') }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>Total (1/S-<small>1</small>)</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Q<small>max</small></h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <p>{{ $jumlah1SMin }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($Qmax, 3, '.', '') }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-style mb-30">
                <h6 class="mb-10">Nilai Utilitas Kuantitatif</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h6>Peringkat</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Alternatif</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Hasil</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utilitas_kuantitatif as $no => $row)
                            <tr>
                                <td class="text-center">
                                    <p>{{ $no+1 }}</p>
                                </td>
                                <td>
                                    <p>{{ $row->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ number_format($row->result, 15, '.', '') }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    var table = new DataTable("table");
</script>
@endpush
