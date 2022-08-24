<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$title ?? ''}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                @foreach($breadcrumbs as $txt)
                <li class="breadcrumb-item {{ isset($txt['link']) ? 'pe-3' : 'text-muted'}}">
                    @if(isset($txt['link']))
                    <a href="{{ $txt['link'] }}" class="pe-3">{{$txt['name']}}</a>
                    @else
                    {{$txt['name']}}
                    @endif
                </li>
                @endforeach
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
