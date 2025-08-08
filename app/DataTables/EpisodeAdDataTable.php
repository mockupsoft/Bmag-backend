<?php

namespace App\DataTables;

use App\Models\EpisodeAd;
use Yajra\DataTables\Services\DataTable;

class EpisodeAdDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('episode', function ($row) {
                $fullName = optional($row->episode)->name;

                if (!$fullName) {
                    return '-';
                }

                $safeFullName = htmlspecialchars($fullName);
                $shortName = mb_strlen($fullName) > 15
                    ? mb_substr($fullName, 0, 15) . '...'
                    : $fullName;

                return '<span data-bs-toggle="tooltip" data-bs-placement="top" title="' . $safeFullName . '">' . e($shortName) . '</span>';
            })

            ->addColumn('title', function ($row) {
                $fullTitle = e($row->title);
                $shortTitle = mb_strimwidth($fullTitle, 0, 15, '...');
                return '<span title="' . $fullTitle . '">' . $shortTitle . '</span>';
            })
            ->addColumn('url', function ($row) {
                return '<a href="' . e($row->url) . '" target="_blank">Link</a>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . e($row->image) . '" width="75">';
            })
            ->addColumn('action', function ($row) {
                return view('admin.episode-ad.partials.actions', compact('row'))->render();
            })
            ->rawColumns(['episode', 'title', 'url', 'image', 'action']);
    }




    public function query(EpisodeAd $model)
    {
        return $model->newQuery()->with('episode');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('episode-ads-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => 'İşlemler', 'width' => '100px'])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'print', 'reset', 'reload'],
                'order' => [[0, 'desc']],
                'pageLength' => 15,
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json'
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id',        'title' => '#'],
            ['data' => 'episode',   'title' => 'Bölüm'],
            ['data' => 'second',    'title' => 'Süre'],
            ['data' => 'title',     'title' => 'Reklam Başlığı'],
            ['data' => 'url',       'title' => 'Bağlantı'],
            ['data' => 'image',     'title' => 'Görsel'],
            ['data' => 'price',     'title' => 'Fiyat (₺)'],
        ];
    }

    protected function filename(): string
    {
        return 'EpisodeAds_' . date('YmdHis');
    }
}
