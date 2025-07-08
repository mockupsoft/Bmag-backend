@extends('admin.parent')

@section('sidebar')
    @include('admin.sidebar', ['page' => 'magazine'])
@endsection

@section('css')

@endsection

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                           Yorum Düzenle</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Gösterge Paneli</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.roll-comments.index') }}" class="text-muted text-hover-primary">Yorumlar</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Yorum
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form class="form" method="POST" action="{{ route('admin.roll-comments.update', $rollComment) }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title fs-3 fw-bold">Genel Bilgiler</div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Form-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3 required">Yorum</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="comment" id="comment" disabled cols="30" rows="10" class="form-control form-control-solid" style="resize: none">{!! $rollComment->comment !!}</textarea>
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Yayın Durumu</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <select name="approved" id="approved" class="form-control form-control-solid">
                                            <option value="approved" @selected(!is_null($rollComment->approved_at))>Onaylı Değil</option>
                                            <option value="not-approved" @selected(!is_null($rollComment->approved_at))>Onaylı</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ route('admin.roll-comments.index') }}" class="btn btn-light btn-active-light-primary me-2">Vazgeç</a>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                            <!--end::Card footer-->
                            <!--end:Form-->
                        </div>
                        <!--end::Card-->
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Big Medya</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link px-2">Deneme</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description', {
            extraPlugins: 'uploadimage',
            removeDialogTabs: 'image:advanced;link:advanced',

            uploadImage: {
                base64: true
            }
        });
    </script>
@endsection
