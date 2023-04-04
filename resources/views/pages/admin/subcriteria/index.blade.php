@extends('layouts.admin')
@section('title')
    Daftar Subkriteria
@endsection
@section('content')
<div class="tables-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h4 class="mb-10">Daftar Subkriteria</h4>
                <p class="text-sm mb-20">
                    Berikut adalah daftar subkriteria yang ada
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table" id="listSubcriteria">
                        <thead>
                            <tr>
                                <th style="display: none">
                                    <h5>ID</h5>
                                </th>
                                <th class="text-center">
                                    <h5>No</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Nama Subkriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Variabel Subkriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Nilai Subkriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Detail Subkriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Ubah Subkriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Hapus Subkriteria</h5>
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
    var datatable = $('#listSubcriteria').DataTable({
        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{{ url('admin-subcriteria-list') }}',
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
            { data: 'criteria_criterias_id', name: 'criteria_criterias_id', class: 'text-center min-width' },
            { data: 'name', name: 'name', class: 'text-center min-width' },
            { data: 'variable', name: 'variable', class: 'text-center min-width' },
            { data: 'value', name: 'value', class: 'text-center min-width' },
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
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
        ],
    })
    $("body").on("click",".admin-subcriteria-destroy",function(){
        var current_object = $(this);
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus subkriteria ini?',
            text: "Untuk sementara, pengguna tidak akan dapat melihat subkriteria ini. Seluruh data terkait dengan subkriteria ini akan ikut terhapus sementara. Anda dapat menampilkan kembali subkriteria ini nantinya",
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