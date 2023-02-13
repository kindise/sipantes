@extends('layouts.main')

@section('title', 'Pemantauan Kesehatan Page')
@section('content')
<div class="row">
    <div class="col-md-12">
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
                                        <input type="text" class="form-control border border-dark text-end" aria-describedby="basic-addon2" name="tb" value="{{ $pantau->tinggibadan ?? old('tb') }}" onkeyup="calcbbideal(this);" value="{{ $pantau->tinggibadan ?? '' }}"/>
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
                                        <input type="text" class="form-control border border-dark text-end" aria-describedby="basic-addon2" name="lw" value="{{ $pantau->lingkarperut ?? old('lw') }}"/>
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
                                        <input type="text" class="form-control border border-dark text-end" aria-describedby="basic-addon2" name="bb" value="{{ $pantau->beratbadan ?? old('bb') }}"/>
                                        <span class="input-group-text" id="basic-addon2">kg</span>
                                        <button class="btn btn-primary bi bi-calculator" type="button" onclick="calculateBMI()"> Hitung IMT</span>
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
                                        <input type="text" class="form-control border border-dark text-end" aria-describedby="basic-addon2" name="lp" value="{{ $pantau->lingkarpanggul ?? old('lp') }}"/>
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
                                    <input type="text" class="form-control border border-dark text-end" name="imt" value="{{ $pantau->imt ?? old('imt') }}"/>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Rasio W/H</label> <span id="warnarasio"></span>
                                    <!--end::Label-->
                                    <div class="input-group">
                                    <input type="text" class="form-control border border-dark text-end" name="rasio" value="{{ $pantau->rasiowh ?? old('rasio') }}"/>
                                    <button class="btn btn-primary bi bi-calculator" type="button" onclick="calcRasio()"> Hitung Rasio</button>
                                    </div>
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
                                    <input type="text" class="form-control border border-dark text-end" name="bbideal" value="{{ $pantau->bbideal ?? old('bbideal') }}"/>
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
                                        <input type="text" class="form-control border border-dark text-end" aria-describedby="basic-addon2" name="tekanandarah" value="{{ $pantau->tekanandarah ?? old('tekanandarah') }}"/>
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
                                        <input type="text" class="form-control  border border-dark text-end" placeholder="GDP" name="gdp" value="{{ $pantau->gdp ?? old('gdp') }}"/>
                                        <span class="input-group-text">/</span>
                                        <input type="text" class="form-control  border border-dark text-end" placeholder="GDS" name="gds" value="{{ $pantau->gds ?? old('gds') }}"/>
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
                                    <label class="fs-5 fw-semibold mb-2">Faktor Risiko</label>
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
                                    <label class="fs-5 fw-semibold mb-2">Faktor Predisposisi</label>
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
                                    <label class="fs-5 fw-semibold mb-2">Diagnosis</label>
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
                                    <textarea class="form-control  border border-dark" name="diet">{{ $pantau->diet ?? old('diet') }}</textarea>
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
                                    <textarea class="form-control  border border-dark" name="fisik">{{ $pantau->latihanfisik ?? old('fisik') }}</textarea>
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

    var warnarasio = document.getElementById('warnarasio');
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
    document.getElementById('btnlog').addEventListener('click', (e) => {
        e.preventDefault();
        var url = '{{ route("log", ":id") }}';
        url = url.replace(':id', '{{ $id }}');
        window.location.href = url;
    });

    function calculateBMI() {
        
        /* Getting input from user into height variable.
        Input is string so typecasting is necessary. */
        let height = parseInt(document
                .querySelector("input[name=tb]").value);

        /* Getting input from user into weight variable. 
        Input is string so typecasting is necessary.*/
        let weight = parseInt(document
                .querySelector("input[name=bb]").value);

        let result = document.querySelector("input[name=imt]");

        // Checking the user providing a proper
        // value or not
        if (height === "" || isNaN(height)) 
            Swal.fire('Error', 'Tinggi badan tidak valid', 'error');

        else if (weight === "" || isNaN(weight)) 
            Swal.fire('Error', 'Berat badan tidak valid', 'error');

        // If both input is valid, calculate the bmi
        else {

            // Fixing upto 2 decimal places
            let bmi = (weight / ((height * height) 
                                / 10000)).toFixed(2);

            // Dividing as per the bmi conditions
            result.value = bmi;
        }
    }

    function calcbbideal(e){
        var tb = e.value;
        var jeniskelamin = '{{$query->jenis_kelamin}}';
        var temp = tb - 100;
        var result = 0;
        if(jeniskelamin == 1){
            result = (parseFloat(temp) * 90) / 100; 
        }else{
            result = (parseFloat(temp) * 83) / 100; 
        }
        document.querySelector('input[name=bbideal]').value = Math.round(result);
    }

    function calcRasio() {
        
        /* Getting input from user into height variable.
        Input is string so typecasting is necessary. */
        let lingkarperut = parseInt(document
                .querySelector("input[name=lw]").value);

        /* Getting input from user into weight variable. 
        Input is string so typecasting is necessary.*/
        let lingkarpanggul = parseInt(document
                .querySelector("input[name=lp]").value);

        let result = document.querySelector("input[name=rasio]");

        // Checking the user providing a proper
        // value or not
        if (lingkarperut === "" || isNaN(lingkarperut)) 
            Swal.fire('Error', 'Lingkar perut tidak valid', 'error');

        else if (lingkarpanggul === "" || isNaN(lingkarpanggul)) 
            Swal.fire('Error', 'Lingkar panggul tidak valid', 'error');

        // If both input is valid, calculate the bmi
        else {
            var age = '{{$age}}';
            var jeniskelamin = '{{$query->jenis_kelamin}}';
            // Fixing upto 2 decimal places
            let rasio = (lingkarperut / lingkarpanggul).toFixed(2);

            // Dividing as per the bmi conditions
            result.value = rasio;

            if(age >= 20 && age <= 29){
                if(jeniskelamin == 1){
                    if(rasio < 0.83){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.83 && rasio <= 0.88){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.89 && rasio <= 0.94){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }else{
                    if(rasio < 0.71){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.71 && rasio <= 0.77){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.78 && rasio <= 0.82){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }
            }else if(age >= 30 && age <= 39){
                if(jeniskelamin == 1){
                    if(rasio < 0.84){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.84 && rasio <= 0.91){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.92 && rasio <= 0.96){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }else{
                    if(rasio < 0.72){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.72 && rasio <= 0.78){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.79 && rasio <= 0.84){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }
            }else if(age >= 40 && age <= 49){
                if(jeniskelamin == 1){
                    if(rasio < 0.88){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.88 && rasio <= 0.95){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.96 && rasio <= 1.00){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }else{
                    if(rasio < 0.73){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.73 && rasio <= 0.79){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.80 && rasio <= 0.87){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }
            }else if(age >= 50 && age <= 59){
                if(jeniskelamin == 1){
                    if(rasio < 0.90){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.90 && rasio <= 0.96){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.97 && rasio <= 1.02){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }else{
                    if(rasio < 0.74){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.74 && rasio <= 0.81){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.82 && rasio <= 0.88){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }
            }else if(age >= 60 && age <= 69){
                if(jeniskelamin == 1){
                    if(rasio < 0.91){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.91 && rasio <= 0.98){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.99 && rasio <= 1.03){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }else{
                    if(rasio < 0.76){
                        color = 'text-success';
                        text = 'NORMAL';
                    }else if(rasio >= 0.76 && rasio <= 0.83){
                        color = 'text-warning';
                        text = 'OBESITAS RINGAN';
                    }else if(rasio >= 0.84 && rasio <= 0.90){
                        color = 'text-info';
                        text = 'OBESITAS BERAT';
                    }else{
                        color = 'text-danger';
                        text = 'OBESITAS SANGAT BERAT';
                    }
                }
            }
            if(color === 'text-info'){
                warnarasio.removeAttribute('class');
                warnarasio.style.color = 'rgb(249 135 17)';
            }else{
                warnarasio.style.removeProperty('color');
                warnarasio.setAttribute('class', color);
            }
            warnarasio.innerText = text;
        }
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
