<?php

namespace App\DataTables;

use App\Models\Magazine;
use Yajra\DataTables\Services\DataTable;

class MagazineDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('name', function ($row) {
                $full = htmlspecialchars($row->name);
                $short = mb_strlen($row->name) > 30 ? mb_substr($row->name, 0, 30) . '...' : $row->name;
                return '<span data-bs-toggle="tooltip" data-bs-placement="top" title="' . $full . '">' . e($short) . '</span>';
            })
            ->addColumn('description', function ($row) {
                $full = htmlspecialchars(strip_tags($row->description));
                $short = mb_strlen($full) > 30 ? mb_substr($full, 0, 30) . '...' : $full;
                return '<span data-bs-toggle="tooltip" data-bs-placement="top" title="' . $full . '">' . e($short) . '</span>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . e($row->image) . '" width="75">';
            })
            ->addColumn('is_active', function ($row) {
                return $row->is_active ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Pasif</span>';
            })
            ->addColumn('action', function ($row) {
                return view('admin.magazine.partials.actions', compact('row'))->render();
            })
            ->rawColumns(['name', 'description', 'image', 'is_active', 'action']);
    }

    public function query(Magazine $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('magazine-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => 'İşlemler', 'width' => '100px'])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'print', 'reset', 'reload'],
                'order' => [[0, 'asc']],
                'pageLength' => 15,
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json'
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id',          'title' => '#',             'className' => 'text-center'],
            ['data' => 'name',        'title' => 'Adı',           'className' => 'text-center'],
            ['data' => 'description', 'title' => 'Açıklama',      'className' => 'text-center'],
            ['data' => 'image',       'title' => 'Görsel',        'className' => 'text-center'],
            ['data' => 'order',       'title' => 'Sıra',          'className' => 'text-center'],
            ['data' => 'is_active',   'title' => 'Durum',         'className' => 'text-center'],
        ];
    }

    protected function filename(): string
    {
        return 'Magazines_' . date('YmdHis');
    }
}
