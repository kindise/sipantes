<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('plugins/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('plugins/dist/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
@yield('jstambahan')
