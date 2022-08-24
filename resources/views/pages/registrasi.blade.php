@extends('layouts.main')

@section('title', 'Pendaftaran Anggota Page')
@section('content')
<div class="row">
<div class="col-xl-6">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <h2>Formulir Pendaftaran</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <div id="errorvalidasi"></div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                 <!--begin::Form-->
                 <form id="formulir_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('submit-pendaftaran') }}" method="post">
                    @csrf
                    @method('POST')
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nama</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="nama_anggota" value=" {{ old('nama_anggota') }}">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 ">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Usia</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="usia" value="{{ old('usia') }}">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Sex</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select" name="sex">
                                    <option value="">--Pilih--</option>
                                    @foreach($sex as $val)
                                    <option value="{{$val->id_kelamin}}">{{$val->nama}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 ">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Agama</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select" name="agama">
                                    <option value="">--Pilih--</option>
                                    @foreach($agama as $val)
                                    <option value="{{$val->agama_id}}">{{$val->nama}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nomer kontak/Hp</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="nokontak" value="{{ old('nokontak') }}">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 ">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Jenis Iuran</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select" name="iuran">
                                    <option value="">--Pilih--</option>
                                    @foreach($tipe as $val)
                                    <option value="{{$val->tipe_id}}">{{$val->nama_tipe}} - Rp {{$val->tarif}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Alamat Rumah</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control" name="alamat" rows="3" >{{ old('alamat') }}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Tempat kerja/unit</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control" name="unit" rows="3" >{{ old('unit') }}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" data-kt-contacts-type="cancel" class="btn btn-danger me-3 btn-sm">Reset Form</button>
                        <!--end::Button-->
                        <button class="btn btn-success me-3 btn-sm" id="btndatamember">Lihat Data Member</button>
                        <!--begin::Button-->
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">Ajukan Pendaftaran</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Action buttons-->
                 </form>
            </div>
        </div>
</div>
@endsection

@section('jstambahan')
<script src="{{ asset('js/helper.js') }}"></script>
<script>
setInputFilter(document.querySelector('input[name=usia]'), function(value) {
    return /^-?\d*$/.test(value);
});
setInputFilter(document.querySelector('input[name=nokontak]'), function(value) {
    return /^-?\d*$/.test(value);
});
</script>
@if(session('success'))
<script>
  Swal.fire('Success', '{{ session('success') }}', 'success');
</script>
@endif
@if(session('msgerror'))
<script>
  Swal.fire('Error', '{{ session('msgerror') }}', 'error');
</script>
@endif
@endsection
