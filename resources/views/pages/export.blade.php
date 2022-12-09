@extends('layouts.main')

@section('title', 'Export Excel Page')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card card-flush">
            <div class="card-body">
            <form class="form" method="post" action="{{ route('exportexcel') }}">
                @csrf
                <!--begin::Input group-->
                <div class="input-group mb-5">
                    <span class="input-group-text" id="basic-addon1">Tanggal</span>
                    <input type="date" id="min" name="tglmulai" class="form-control" value="{{ date('Y-m-d') }}">
                    <span class="input-group-text" id="basic-addon1">s/d</span>
                    <input type="date" id="max" name="tglsd" class="form-control" value="{{ date('Y-m-d') }}">
                    <button class="btn btn-success" type="submit"><i class="bi bi-download me-3"></i>Export</button>
                </div>
                <!--end::Input group-->
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jstambahan')
    <script type="text/javascript">
        $("#cari_tanggal").flatpickr({
            altInput: true,
            altFormat: 'd-m-Y',
            dateFormat: "Y-m-d",
            mode: 'range'
        });
    </script>
@endsection