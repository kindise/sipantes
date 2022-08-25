@extends('layouts.main')

@section('title', 'Data Anggota Page')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-7 border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Daftar Anggota Pemantauan Kesehatan</h2>
                </div>
                <!--end::Card title-->
            </div>
                <!--begin::Card body-->
                <div class="card-body">
                <div class="row">
                    <div class="d-flex align-items-center gap-2 my-1">
                        <div class="d-flex align-items-center position-relative">
                            <span class="svg-icon svg-icon-2 position-absolute ms-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-sm form-control-solid mw-100 min-w-150px min-w-md-200px ps-12" placeholder="Pencarian Anggota">
                        </div>
                        <button id="btnrefresh" class="btn btn-sm btn-primary"><span class="svg-icon svg-icon-1"><i class="bi bi-arrow-repeat"></i></span>Refresh</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="kt-anggota" class="table table-striped table-hover align-middle fs-7 table-row-bordered table-rounded gy-2 gs-2" style="width:100%">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th>Aksi</th>
                                <th>No Anggota</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Kontak</th>
                                <th>Tarif Iuran</th>
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
@section('styletambahan')
<link href="{{ asset('plugins/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('jstambahan')
<script src="{{ asset('js/helper.js') }}"></script>
<script src="{{ asset('plugins/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    var KTDatatablesServerSide = function() {
        var dt;
        var initDatatable = function() {
            dt = $('#kt-anggota').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: 500,
                "pageLength": 50,
                "lengthChange": false,
                deferRender: true,
                responsive: true,
                order: [[1, 'desc']],
                ajax:  "{{ route('datatable') }}",
                columns: [
                    {data: 'aksi', name: 'aksi', "sortable": false, searchable: false},
                    {data: 'regno', name: 'a.regno'},
                    {data: 'nama', name: 'a.nama'},
                    {data: 'usia', name: 'a.usia', className:'text-end'},
                    {data: 'sex', name: 'sex' },
                    {data: 'nohp', name: 'a.nohp'},
                    {data: 'nama_tipe', name: 'c.nama_tipe'},
                ],
                drawCallback: function(settings) {
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    })
                },
                 columnDefs: [{
                    "defaultContent": "-"
                    , "targets": "_all",
                }]

            });

            dt.on('draw', function() {
                KTMenu.createInstances();
            });
        }

        var handleSearchDatatable = function() {
            const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
            filterSearch.addEventListener('keyup', function(e) {
                dt.search(e.target.value).draw();
                return;
            });
        }

        // Public methods
        return {
            init: function() {
                initDatatable();
                handleSearchDatatable();
                //handleVerifikasi();

            }
        }
    }();
    KTUtil.onDOMContentLoaded(function() {
        KTDatatablesServerSide.init();
    });
</script>
@endsection
