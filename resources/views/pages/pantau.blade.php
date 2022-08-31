@extends('layouts.main')

@section('title', 'Pemantauan Kesehatan Page')
@section('content')
<div class="row">
    <div class="col-md-12 col-xxl-12">
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
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('buatpantauan') }}">
                @csrf
                <div class="d-flex flex-column flex-lg-row mb-17">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-0 me-lg-20">
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
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">IMT</label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control border border-dark" name="imt" value="{{ old('imt') }}"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Rasio W/H</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control border border-dark" name="rasio" value="{{ old('rasio') }}"/>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Berat Badan Ideal</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control border border-dark" name="bbideal" value="{{ old('bbideal') }}"/>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Tekanan Darah</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <div class="input-group">
                                        <input type="text" class="form-control border border-dark" aria-describedby="basic-addon2" name="tekanandarah" value="{{ old('tekanandarah') }}"/>
                                        <span class="input-group-text" id="basic-addon2">mm/hg</span>
                                    </div>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">GDP/GDS</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="input-group mb">
                                        <input type="text" class="form-control  border border-dark" placeholder="GDP" name="gdp" value="{{ old('gdp') }}"/>
                                        <span class="input-group-text">/</span>
                                        <input type="text" class="form-control  border border-dark" placeholder="GDS" name="gds" value="{{ old('gds') }}"/>
                                        <span class="input-group-text">mg/dl</span>
                                    </div>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Faktor Risiko</label>
                                    <!--end::Label-->
                                    @foreach($resiko as $val)
                                    <div class="form-check form-check-custom form-check-solid mt-2">
                                        <input class="form-check-input border border-dark" type="checkbox" value="{{$val->resiko_id}}" id="fresiko" name="resiko[]" {{ (is_array(old('resiko')) and in_array($val->resiko_id, old('resiko'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$val->nama}}
                                        </label>
                                    </div>
                                    @endforeach
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Faktor Predisposisi</label>
                                    <!--end::Label-->
                                    @foreach($predisposisi as $val)
                                    <div class="form-check form-check-custom form-check-solid mt-2">
                                        <input class="form-check-input border border-dark" type="checkbox" value="{{$val->predisposisi_id}}" id="fpredisposisi" name="predisposisi[]" {{ (is_array(old('predisposisi')) and in_array($val->predisposisi_id, old('predisposisi'))) ? 'checked' : '' }}/>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$val->nama}}
                                        </label>
                                    </div>
                                    @endforeach
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Diagnosis</label>
                                    <!--end::Label-->
                                    <div class="row">
                                    @foreach($diagnosis as $val)
                                    <div class="col-md-6">
                                        <div class="form-check form-check-custom form-check-solid mt-2">
                                            <input class="form-check-input border border-dark" type="checkbox" value="{{$val->diagnosis_id}}" name="diagnosis" onclick="selectOnlyThis(this)" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{$val->nama_diagnosis}}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->

                                <!--end::Col-->
                            </div>
                            <div class="row mt-4" >
                                <div class="col-md-12 fv-row fv-plugins-icon-container" id="fetchtipe">

                                </div>
                            </div>
                    </div>
                    <div class="flex-lg-row-auto w-150 w-lg-325px w-xxl-400px">
                        <!--begin::Careers about-->
                        <div class="card border border-2 border-dashed border-dark shadow mb-3">
                            <!--begin::Body-->
                            <div class="card-body py-1">
                                <!--begin::Top-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <h2 class="fs-1 text-gray-800 w-bolder mb-6 pt-3">Biodata Anggota</h2>
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
                            <div class="row mt-11">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Program Diet</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea class="form-control  border border-dark" name="diet">{{ old('diet') }}</textarea>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Program Latihan Fisik</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea class="form-control  border border-dark" name="fisik">{{ old('fisik') }}</textarea>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark me-3 btn-sm" id="btnlog" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat catatan">Lihat Catatan</button>
                                <!--begin::Button-->
                                <button type="reset" data-kt-contacts-type="cancel" class="btn btn-danger me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form">Reset Form</button>
                                <!--begin::Button-->
                                <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan data">
                                    <span class="indicator-label">Simpan Data</span>
                                </button>
                                <!--end::Button-->
                            </div>
                        <!--end::Careers about-->
                    </div>
                </div>
                <input type="hidden" name="member" value="{{$id}}" />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('jstambahan')
<script src="{{ asset('js/helper.js') }}"></script>
<script>
    setInputFilter(document.querySelector('input[name=tb]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=lw]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=bb]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=lp]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=imt]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=bbideal]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    setInputFilter(document.querySelector('input[name=rasio]'), function(value) {
        return /^-?\d*[.,]?\d*$/.test(value); });
    function selectOnlyThis(id){
        var myCheckbox = document.getElementsByName("diagnosis");
        if(id.checked){
            Array.prototype.forEach.call(myCheckbox,function(el){
                el.checked = false;
            });
            id.checked = true;
        }else{
            var tipe = document.getElementById('fetchtipe');
            while (tipe.lastElementChild) {
                tipe.removeChild(tipe.lastElementChild);
            }
            return;
        }

        (async () => {
            try {
                let response = await fetch('{{ route("detaildiagnosa") }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        tipe: id.value,
                    })
                });
                let data = await response.json();
                if(!response.ok){
                    throw new Error(response.statusText);
                }else{
                    var result = data.map((c) => {
                        return `<div class="form-check form-check-custom form-check-solid mt-2">
                                        <input class="form-check-input border border-dark" type="checkbox" value="${c.diagnosis_attr}"name="obesitas" onclick="selectobesitas(this);"/>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            ${c.nama_attr}
                                        </label>
                                </div>`;
                    });
                    document.getElementById('fetchtipe').innerHTML = result.join("");
                }
            } catch (err) {
                Swal.fire("Error", "Data tidak ditemukan", "error");
            }
        })();
    }
    function selectobesitas(id){
        var myCheckbox = document.getElementsByName("obesitas");
        Array.prototype.forEach.call(myCheckbox,function(el){
            el.checked = false;
        });
        id.checked = true;
    }

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
