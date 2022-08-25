@extends('layouts.main')

@section('title', 'Pemantauan Kesehatan Page')
@section('content')
<div class="row">
    <div class="col-md-8 col-xxl-8">
        <!--begin::Contacts-->
        <div class="card">
            <!--begin::Card header-->
           <!--  <div class="card-header pt-7">
                <div class="card-title">
                    <h2>Detail Anggota</h2>
                </div>
            </div> -->
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <div class="d-flex flex-column flex-lg-row mb-17">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-0 me-lg-20">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post">
                            <!--begin::Input group-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">First Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="first_name">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Last Name</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="last_name">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                        </form>
                    </div>
                    <div class="flex-lg-row-auto w-150 w-lg-325px w-xxl-400px">
                        <!--begin::Careers about-->
                        <div class="card border border-2 border-dashed border-dark shadow">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Top-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <h2 class="fs-1 text-gray-800 w-bolder mb-6">Detail Anggota</h2>
                                    <!--end::Title-->
                                    <!--begin::Text-->
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
                                    <!--end::Text-->
                                </div>
                                <!--end::Top-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Careers about-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('styletambahan')
@endsection
@section('jstambahan')
<script src="{{ asset('js/helper.js') }}"></script>
<script>

</script>
