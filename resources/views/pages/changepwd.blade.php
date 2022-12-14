@extends('layouts.main')

@section('title', 'Ubah Password Page')
@section('content')
<div class="row">
    <div class="col-md-6 col-xxl-6">
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <div class="card-title">
                    <h2>Ganti Password</h2>
                </div>
            </div>
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
                <form id="formulir_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('pwd') }}" method="post">
                @csrf
                @method('POST')
                    <div class="col-12">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwd" name="pwd">
                    </div>
                    <div class="col-12">
                        <label for="konfirmasipwd" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasipwd" name="pwd_confirmation">
                    </div>
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" data-kt-contacts-type="cancel" class="btn btn-danger me-3 btn-sm">Reset Form</button>
                        <!--end::Button-->
                        <!-- <button class="btn btn-success me-3 btn-sm" id="btndatamember">Lihat Data Member</button> -->
                        <!--begin::Button-->
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">Ganti Password</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Action buttons-->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jstambahan')
@if (Session::has('error'))
<script>
	Swal.fire("Error!", "{{ Session::get('error') }}", "error");
</script>
@endif
@if (Session::has('msg'))
<script>
	Swal.fire("Success!", "{{ Session::get('msg') }}", "success");
</script>
@endif
@endsection