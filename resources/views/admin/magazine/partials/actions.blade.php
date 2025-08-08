<!--begin::Actions-->
<div class="dropdown">
    <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
        İşlemler
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
    </button>

    <div class="dropdown-menu dropdown-menu-end menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="{{ route('admin.magazine-issue.index', $row) }}" class="menu-link px-3">Sayılar</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="{{ route('admin.roll.index', $row) }}" class="menu-link px-3">Roll</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="{{ route('admin.magazine.edit', $row) }}" class="menu-link px-3">Düzenle</a>
        </div>
        <!--end::Menu item-->
    </div>
</div>
<!--end::Actions-->
