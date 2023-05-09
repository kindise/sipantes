@extends('layouts.main')

@section('title', 'Login Page')
@section('styletambahan')
	<style>
		body { background-image: url("{{ asset('plugins/dist/assets/media/bg-login.jpg')}}"); } [data-theme="dark"]
		body { background-image: url("{{ asset('plugins/dist/assets/media/bg-login.jpg')}}"); }
	</style>
@endsection
@section('content')
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-column">
						<!--begin::Logo-->
						<a href="javascript:void(0)" class="mb-7">
							<img alt="Logo" src="{{ asset('plugins/dist/assets/media/logo-rspr-new.png') }}" class="w-50">
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal ms-3">Kami peduli kesehatan anda</h2>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-450px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" method="post">
							@csrf
							<!--begin::Heading-->
								<div class="text-center mb-15">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-universal-access" viewBox="0 0 16 16">
									<path d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6 5.5l-4.535-.442A.531.531 0 0 1 1.531 4H14.47a.531.531 0 0 1 .066 1.058L10 5.5V9l.452 6.42a.535.535 0 0 1-1.053.174L8.243 9.97c-.064-.252-.422-.252-.486 0l-1.156 5.624a.535.535 0 0 1-1.053-.174L6 9V5.5Z"/>
									</svg>
									Silahkan Masuk</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">Sistem Informasi Pemantauan Kesehatan Karyawan RSUD Pasar Rebo</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
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
								<!--begin::Input group=-->
								<div class="fv-row mb-8 mt-5 fv-plugins-icon-container">
									<!--begin::Email-->
									<input type="text" placeholder="No Absen" name="noabsen" value="{{ old('noabsen') }}" autocomplete="off" class="form-control bg-transparent" autofocus>
									<!--end::Email-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group=-->
								<div class="fv-row mb-3 fv-plugins-icon-container" data-kt-password-meter="true">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent">
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
									<!--end::Password-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group=-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Masuk</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<div class="text-gray-800 text-center fw-semibold fs-6">RSUD Pasar Rebo </div>
								<div class="text-gray-500 text-center fw-semibold fs-7">Copyright &copy; {{ date('Y') }} </div>
							<div></div></form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
<!--end::Authentication - Sign-in-->
<!--end::Main-->
@endsection

@section('jstambahan')
<!-- <script src="{{ asset('plugins/dist/assets/js//custom/authentication/sign-in/general.js') }}"></script> -->
@if (Session::has('msg'))
<script>
	Swal.fire("Error!", "{{ Session::get('msg') }}", "error");
</script>
@endif
</script>
@endsection
