@extends('admin.parent')

@section('sidebar')
    @include('admin.sidebar', ['page' => 'role'])
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
                            {{ $role->label }} Rolü Ayarları</h1>
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
                                <a href="{{ route('admin.role.index') }}" class="text-muted text-hover-primary">Roller</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">{{ $role->label }}</li>
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
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title fs-3 fw-bold">Genel Ayarlar</div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ route('admin.role.update', $role) }}">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->

                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Rol Adı</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="label" value="{{ $role->label }}" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                @foreach($permissions->groupBy('category') as $category => $permissions)
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">{{ $category }}</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9">
                                        <div class="d-flex fw-semibold h-100">
                                            @foreach($permissions as $permission)
                                                <div class="form-check form-check-custom form-check-solid me-9">
                                                    <input name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="{{ $permission->name }}" @checked(in_array($permission->name, $permissionNames))/>
                                                    <label class="form-check-label ms-3" for="{{ $permission->name }}">{{ $permission->label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                @endforeach
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Durum</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" id="status" name="status" checked="checked" />
                                            <label class="form-check-label fw-semibold text-gray-500 ms-3" for="status">Aktif</label>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ route('admin.role.index') }}" class="btn btn-light btn-active-light-primary me-2">Vazgeç</a>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                            <!--end::Card footer-->
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Card-->
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
                    <a href="javascript:void(0);" class="text-gray-800 text-hover-primary">Big Medya</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="javascript:void(0);" onclick="alert('Yakında')" class="menu-link px-2">Destek</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
