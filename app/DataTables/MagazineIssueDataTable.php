<?php

namespace App\DataTables;

use App\Models\MagazineIssue;
use Yajra\DataTables\Services\DataTable;

class MagazineIssueDataTable extends DataTable
{
    public $magazine;

    public function __construct($magazine = null)
    {
        $this->magazine = $magazine;
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('issue_month', function ($row) {
                return e($row->issue_month);
            })
            ->editColumn('description', function ($row) {
                $full = strip_tags($row->description);
                $short = mb_strlen($full) > 30 ? mb_substr($full, 0, 30) . '...' : $full;
                return '<span title="' . e($full) . '">' . e($short) . '</span>';
            })
            ->addColumn('cover_image', function ($row) {
                return '<img src="' . e($row->cover_image) . '" width="100">';
            })
            ->addColumn('pdf_path', function ($row) {
                return '<a href="' . e($row->pdf_path) . '" target="_blank">PDF</a>';
            })
            ->addColumn('is_published', function ($row) {
                return $row->is_published
                    ? '<span class="badge bg-success">Yayında</span>'
                    : '<span class="badge bg-secondary">Taslak</span>';
            })
            ->addColumn('action', function ($row) {
                return view('admin.magazine-issue.partials.actions', compact('row'))->render();
            })
            ->rawColumns(['description', 'cover_image', 'pdf_path', 'is_published', 'action']);
    }

    public function query(MagazineIssue $model)
    {
        return $model->newQuery()
            ->where('magazine_id', $this->magazine->id)
            ->orderBy('created_at', 'desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('magazine-issues-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => 'İşlemler', 'width' => '100px'])
            ->parameters([
                'dom' => 'Bfrtip',
                'pageLength' => 15,
                'order' => [[0, 'desc']],
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json'
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id',            'title' => '#',             'className' => 'text-center'],
            ['data' => 'issue_month',   'title' => 'Ay',            'className' => 'text-center'],
            ['data' => 'issue_code',    'title' => 'Sayı Kodu',     'className' => 'text-center'],
            ['data' => 'description',   'title' => 'Açıklama',      'orderable' => true, 'searchable' => true],
            ['data' => 'cover_image',   'title' => 'Kapak',         'className' => 'text-center'],
            ['data' => 'price',         'title' => 'Fiyat',         'className' => 'text-center'],
            ['data' => 'stock',         'title' => 'Stok',          'className' => 'text-center'],
            ['data' => 'is_published',  'title' => 'Durum',         'className' => 'text-center'],
            ['data' => 'pdf_path',      'title' => 'PDF',           'className' => 'text-center'],
        ];
    }

    protected function filename(): string
    {
        return 'MagazineIssues_' . date('YmdHis');
    }
}
