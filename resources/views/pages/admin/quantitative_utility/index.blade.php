@extends('layouts.admin')
@section('title')
    Daftar Hasil Utilitas Kuantitatif
@endsection
@section('content')
<div class="tables-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h4 class="mb-10">Daftar Hasil Utilitas Kuantitatif</h4>
                <p class="text-sm mb-20">
                    Berikut adalah hasil utilitas kuantitatif yang ada
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table" id="listQuantitativeUtility">
                        <thead>
                            <tr>
                                <th style="display: none">
                                    <h5>ID</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Peringkat</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Nama Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Hasil</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    var datatable = $('#listQuantitativeUtility').DataTable({
        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{{ url('admin-quantitative_utility-list') }}',
        },
        columns: [
            {
                data: 'id',
                name: 'id',
                visible: false,
                orderable: false,
                searchable: false,
                class: 'text-center min-width',
            },
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                class: 'text-center min-width',
            },
            { data: 'alternative_alternatives_id', name: 'alternative_alternatives_id', class: 'text-center min-width' },
            { data: 'result', name: 'result', class: 'text-center min-width' },
        ],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
        ],
    })
</script>
@endpush