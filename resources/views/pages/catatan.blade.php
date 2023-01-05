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
                                    <th class="min-w-125px">Aksi</th>
                                    <th class="min-w-125px">No Pemantauan</th>
                                    <th class="min-w-125px">No Anggota</th>
                                    <th class="min-w-125px">Tanggal</th>
                                    <th class="min-w-125px">TB</th>
                                    <th class="min-w-125px">BB</th>
                                    <th class="min-w-125px">Lingkar Perut</th>
                                    <th class="min-w-125px">Lingkar Panggul</th>
                                    <th class="min-w-125px">IMT</th>
                                    <th class="min-w-125px">BB Ideal</th>
                                    <th class="min-w-125px">Rasio W/H</th>
                                    <th class="min-w-125px">TD</th>
                                    <th class="min-w-125px">GDP / GDS</th>
                                    <th class="min-w-125px">Diet</th>
                                    <th class="min-w-125px">Latihan Fisik</th>
                                    <th class="min-w-125px">Diagnosis</th>
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
    <div class="col-md-12">
    <div class="card ">
    <div class="card-header card-header-stretch">
        <h3 class="card-title">Grafik</h3>
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_7">IMT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_8">Rasio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_9">Tekanan Darah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_10">GDP/GDS</a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                <canvas id="kt_chart"></canvas>
            </div>

            <!-- <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                <canvas id="chart_rasio" class="mh-400px"></canvas>
            </div>

            <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                <canvas id="chart_td" class="mh-400px"></canvas>
            </div>

            <div class="tab-pane fade" id="kt_tab_pane_10" role="tabpanel">
                <canvas id="chart_gdpgds" class="mh-400px"></canvas>
            </div> -->
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
        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('buatpantauan') }}">
            @csrf
            @method('patch')
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Tinggi Badan</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="input-group">
                        <input type="text" class="form-control border border-dark" aria-describedby="basic-addon2" name="tb" value="{{ old('tb') }}"/>
                        <span class="input-group-text" id="basic-addon2">cm</span>
                    </div>
                    <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--end::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Lingkar Perut (W)</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <div class="input-group">
                        <input type="text" class="form-control border border-dark" aria-describedby="basic-addon2" name="lw" value="{{ old('lw') }}"/>
                        <span class="input-group-text" id="basic-addon2">cm</span>
                    </div>
                    <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
            </div>
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Berat Badan</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="input-group">
                        <input type="text" class="form-control border border-dark" aria-describedby="basic-addon2" name="bb" value="{{ old('bb') }}"/>
                        <span class="input-group-text" id="basic-addon2">cm</span>
                    </div>
                    <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--end::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Lingkar Panggul (H)</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <div class="input-group">
                        <input type="text" class="form-control border border-dark" aria-describedby="basic-addon2" name="lp" value="{{ old('lp') }}"/>
                        <span class="input-group-text" id="basic-addon2">cm</span>
                    </div>
                    <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
            </div>
        </form>
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
                order: [],
                ajax:  url,
                columns: [
                    {data: 'aksi', name: 'aksi', "sortable": false, searchable: false},
                    {data: 'pantau_id', name: 'pantau_id'},
                    {data: 'regno', name: 'regno'},
                    {data: 'pantau_date', name: 'pantau_date'},
                    {data: 'tinggibadan', name: 'tinggibadan'},
                    {data: 'beratbadan', name: 'beratbadan'},
                    {data: 'lingkarperut', name: 'lingkarperut'},
                    {data: 'lingkarpanggul', name: 'lingkarpanggul'},
                    {data: 'imt', name: 'imt'},
                    {data: 'bbideal', name: 'bbideal'},
                    {data: 'rasiowh', name: 'rasiowh'},
                    {data: 'tekanandarah', name: 'tekanandarah'},
                    {data: null,
                        render: function ( data, type, row ) {
                            return data.gdp + '/' + data.gds;
                    }},
                    {data: 'diet', name: 'diet'},
                    {data: 'latihanfisik', name: 'latihanfisik'},
                    {data: null,
                        render: function ( data, type, row ) {
                            return data.nama_diagnosis + ' -> ' + data.nama_attr;
                    }},
                    
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
            let response = await fetch(url, {});
            if(!response.ok){
                const text = await response.text();
                throw new Error(text);
            }
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
            Swal.fire("Error", err.message, "error");
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

    const graphimt = async () => {
        var ctx = document.getElementById('kt_chart');
        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
        var successColor = KTUtil.getCssVariableValue('--kt-success');
        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        try {
            var url = '{{ route("chart", ":regno") }}';
            url = url.replace(':regno', window.location.pathname.split('/')[3]);
            let label = [];
            let response = await fetch(`${url}`, {});
            let data = await response.json();
            if(!response.ok){
                throw new Error(data.msg);
            }
            label.push(...data.label);
            // Chart data
            let ds = {
                labels: label,
                datasets: data.data
            };

            console.log(ds);


            // Chart config
            const config = {
                type: 'bar',
                data: ds,
                options: {
                    plugins: {
                        title: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                    },
                    scales: {
                        x: {
                            stacked: true,
                            title: {
                            display: true,
                            text: 'Grafik IMT, Rasio, Tekanan Darah, GDP/GDS',
                            color: '#911',
                            font: {
                                family: 'Comic Sans MS',
                                size: 20,
                                weight: 'bold',
                                lineHeight: 1.2,
                            },
                                padding: {top: 20, left: 0, right: 0, bottom: 0}
                            },
                        },
                        y: [{
                            ticks: {
                                min: -10,
                                max: 100,
                                stepSize: 5
                            }
                        }]
                    }
                },
                defaults:{
                    global: {
                        defaultFont: fontFamily
                    }
                }
            };

            var myChart = new Chart(ctx, config);
            
        } catch (err) {
            console.log(err);
            Swal.fire("Error", err.msg, "error");
        }
    }

    graphimt();

</script>
@endsection
