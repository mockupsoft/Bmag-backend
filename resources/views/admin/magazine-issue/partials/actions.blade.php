<div class="dropdown">
    <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
        İşlemler <i class="ki-duotone ki-down fs-5 ms-1"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <a href="{{ route('admin.magazine-issue.edit', [$row->magazine_id, $row->id]) }}" class="dropdown-item">Düzenle</a>
        <a href="#" class="dropdown-item text-danger">Sil</a>
    </div>
</div>
