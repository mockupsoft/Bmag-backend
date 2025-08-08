<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EpisodeAdDataTable;
use App\Http\Controllers\Controller;

class EpisodeAdController extends Controller
{
    public function index(EpisodeAdDataTable $dataTable)
    {
        return $dataTable->render('admin.episode-ad.index');
    }

}
