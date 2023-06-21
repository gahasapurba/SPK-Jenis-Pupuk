@extends('layouts.admin')
@section('title')
    Daftar Kriteria
@endsection
@section('content')
<div class="tables-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h4 class="mb-10">Daftar Kriteria</h4>
                <p class="text-sm mb-20">
                    Berikut adalah daftar kriteria yang ada
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table" id="listCriteria">
                        <thead>
                            <tr>
                                <th style="display: none">
                                    <h5>ID</h5>
                                </th>
                                <th class="text-center">
                                    <h5>No</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Kode Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Nama Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Bobot Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Tipe Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Detail Kriteria</h5>
                                </th>
                                {{-- <th class="text-center">
                                    <h5>Ubah Kriteria</h5>
                                </th>
                                <th class="text-center">
                                    <h5>Hapus Kriteria</h5>
                                </th> --}}
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
    var datatable = $('#listCriteria').DataTable({
        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{{ url('admin-criteria-list') }}',
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
            { data: 'code', name: 'code', class: 'text-center min-width' },
            { data: 'name', name: 'name', class: 'text-center min-width' },
            { data: 'weight', name: 'weight', class: 'text-center min-width' },
            { data: 'type', name: 'type', class: 'text-center min-width' },
            {
                data: 'show',
                name: 'show',
                orderable: false,
                searchable: false,
                class: 'text-center',
            },
            // {
            //     data: 'edit',
            //     name: 'edit',
            //     orderable: false,
            //     searchable: false,
            //     class: 'text-center',
            // },
            // {
            //     data: 'delete',
            //     name: 'delete',
            //     orderable: false,
            //     searchable: false,
            //     class: 'text-center',
            // },
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
    $("body").on("click",".admin-criteria-destroy",function(){
        var current_object = $(this);
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus kriteria ini?',
            text: "Untuk sementara, pengguna tidak akan dapat melihat kriteria ini. Seluruh data terkait dengan kriteria ini akan ikut terhapus sementara. Anda dapat menampilkan kembali kriteria ini nantinya",
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