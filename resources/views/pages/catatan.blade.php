@extends('layouts.main')

@section('title', 'Catatan Kesehatan Page')
@section('content')
<div class="row">
    <div class="col-md-12">
     <div class="card">
        <div class="card-body pt-5">
            <div class="d-flex flex-column flex-lg-row mb-17">
                <div class="flex-lg-row-fluid me-0 me-lg-20">
                    <div class="row">
                        <div class="d-flex align-items-center gap-2 my-1">
                            <div class="d-flex align-items-center position-relative">
                                <span class="svg-icon svg-icon-2 position-absolute ms-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-sm form-control-solid mw-100 min-w-150px min-w-md-200px ps-12" placeholder="Pencarian Catatan">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="kt-log" class="table table-striped table-hover align-middle fs-7 table-row-bordered table-rounded gy-2 gs-2" style="width:100%">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800">
                                    <th>Aksi</th>
                                    <th>No Pemantauan</th>
                                    <th>No Anggota</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="flex-lg-row-auto w-150 w-lg-325px w-xxl-400px">
                    <div class="card border border-2 border-dashed border-dark shadow mb-3">
                        <div class="card-body py-1">
                            <div class="mb-7">
                                <h2 class="fs-1 text-gray-800 w-bolder pt-3">Biodata Anggota</h2>
                                <div class="flex-equal me-5">
                                    <table class="table table-flush fw-semibold gy-1">
                                            <tbody>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">No. Anggota</td>
                                                    <td class="text-gray-800">{{$id}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Nama</td>
                                                    <td class="text-gray-800">{{$query->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Usia</td>
                                                    <td class="text-gray-800">{{$query->usia}} Tahun</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Jenis Kelamin</td>
                                                    <td class="text-gray-800">{{($query->jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan')}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Unit kerja</td>
                                                    <td class="text-gray-800">{{$query->tempat_kerja}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Kontak/Hp</td>
                                                    <td class="text-gray-800">{{$query->nohp}}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
</div>

<!--begin::View component-->
<div
    id="kt_drawer_example_basic"
    class="bg-white"
    data-kt-drawer="true"
    data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_example_basic_button"
    data-kt-drawer-close="#kt_drawer_example_basic_close"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'500px', 'md': '500px'}"
    data-kt-drawer-direction="start"
>
    <div class="card rounded-0 w-100">
        <!--begin::Card header-->
        <div class="card-header pe-5">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Ubah Pemantauan</a>
                </div>
                <!--end::User-->
            </div>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_basic_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body hover-scroll-overlay-y">

        </div>
    </div>
</div>
<!--end::View component-->
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
        var url = '{{ route("dtablelog", ":id") }}';
        url = url.replace(':id', '{{ $id }}');
        var initDatatable = function() {
            dt = $('#kt-log').DataTable({
                processing: true,
                serverSide: true,
                deferRender: true,
                responsive: true,
                order: [],
                ajax:  url,
                columns: [
                    {data: 'aksi', name: 'aksi', "sortable": false, searchable: false},
                    {data: 'pantau_id', name: 'pantau_id'},
                    {data: 'regno', name: 'regno'},
                    {data: 'pantau_date', name: 'pantau_date'},
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
    KTDrawer.createInstances();
    var drawerEl = document.querySelector("#kt_drawer_example_basic");
    var drawer = KTDrawer.getInstance(drawerEl);
    drawer.on("kt.drawer.toggle", function() {
            console.log("kt.drawer.toggle event is fired");
    });
    drawer.on("kt.drawer.toggled", function() {
        console.log("kt.drawer.toggled event is fired");
    });
    drawer.on("kt.drawer.hide", function() {
        console.log("kt.drawer.hide event is fired");
    });
    drawer.on("kt.drawer.after.hidden", function() {
        console.log("kt.drawer.after.hidden event is fired");
    });
    drawer.on("kt.drawer.show", function() {
        console.log("kt.drawer.show event is fired");
    });
    drawer.on("kt.drawer.shown", function() {
        console.log("kt.drawer.shown event is fired");
    });
    const ubah = async (e) => {
        var kode = e.name;
        var url = '{{ route("trpantau", ":id") }}';
        url = url.replace(':id', kode);
        try {
            let response = await fetch(url);
            let data = await response.json();
            console.log(data);
            drawer.show();
          /*   url = 'http://10.0.10.201:2000/master/negara/patch/:id';
            url = url.replace(':id', kode);
            document.querySelector('input[name="kode_iso"]').value = data.ISO;
            document.querySelector('input[name="nama_negara"]').value = data.NAME;
            document.querySelector('input[name="kode_telpon"]').value = data.PHONECODE;
            document.querySelector('input[name="country_id"]').value = data.COUNTRY_ID;
            frm.setAttribute('action', url);
            document.querySelector('input[name="_method"]').value = 'patch';
            document.querySelector('#modal_header_negara h2').innerText = 'Edit Negara'; */
        } catch (err) {
            Swal.fire("Error", "Data tidak ditemukan", "error");
        }
    }
    const hapus = async (e) => {
        var kode = e.name;
        Swal.fire({
            title: "Apa anda yakin ingin hapus item ini",
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            cancelButtonText: 'Keluar',
            confirmButtonText: "Lanjutkan Hapus",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            },
            showLoaderOnConfirm: true,
            preConfirm: (input) => {
                var prm = {
                    _token: '{{ csrf_token() }}',
                    pantau_id: `${kode}`
                }
                return fetch("{{ route('hapuscatatan') }}", {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(
                            prm
                        )
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            }
            , allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: `${result.value.msg}`,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = window.location.href;
                    } else if (result.dismiss) {
                        window.location.href = window.location.href;
                    }
                })
            }
        })
    }

</script>
@endsection
