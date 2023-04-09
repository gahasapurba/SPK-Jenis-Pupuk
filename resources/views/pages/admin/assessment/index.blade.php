@extends('layouts.admin')
@section('title')
    Daftar Penilaian
@endsection
@section('content')
<div class="tables-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h4 class="mb-10">Daftar Penilaian</h4>
                <p class="text-sm mb-20">
                    Berikut adalah daftar penilaian yang ada
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table" id="listAssessment">
                        <thead>
                            <tr>
                                <th style="display: none">
                                    <h5>ID</h5>
                                </th>
                                <th class="text-center">
                                    <h5>No</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Nama Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Curah Hujan Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Jenis Tanah Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Kandungan N Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Kandungan P Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Kandungan K Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Harga Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Detail Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Ubah Alternatif</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Hapus Alternatif</h5>
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
    var datatable = $('#listAssessment').DataTable({
        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{{ url('admin-assessment-list') }}',
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
            { data: 'name', name: 'name', class: 'text-center min-width' },
            { data: 'rainfall', name: 'rainfall', class: 'text-center min-width' },
            { data: 'soil_type', name: 'soil_type', class: 'text-center min-width' },
            { data: 'nitrogen', name: 'nitrogen', class: 'text-center min-width' },
            { data: 'phosphor', name: 'phosphor', class: 'text-center min-width' },
            { data: 'kalium', name: 'kalium', class: 'text-center min-width' },
            { data: 'price', name: 'price', class: 'text-center min-width' },
            {
                data: 'show',
                name: 'show',
                orderable: false,
                searchable: false,
                class: 'text-center',
            },
            {
                data: 'edit',
                name: 'edit',
                orderable: false,
                searchable: false,
                class: 'text-center',
            },
            {
                data: 'delete',
                name: 'delete',
                orderable: false,
                searchable: false,
                class: 'text-center',
            },
        ],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
        ],
    })
    $("body").on("click",".admin-assessment-destroy",function(){
        var current_object = $(this);
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus penilaian ini?',
            text: "Untuk sementara, pengguna tidak akan dapat melihat penilaian ini. Seluruh data terkait dengan penilaian ini akan ikut terhapus sementara. Anda dapat menampilkan kembali penilaian ini nantinya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var form =  current_object.closest("form");
                form.submit();
            }
        });
    });
</script>
@endpush
