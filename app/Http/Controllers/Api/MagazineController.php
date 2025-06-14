<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MagazineCollection;
use App\Services\MagazineService;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    private MagazineService $magazineService;

    public function __construct(MagazineService $magazineService)
    {
        $this->magazineService = $magazineService;
    }

    public function getMagazines()
    {
        $magazines = $this->magazineService->getMagazines();
        return new MagazineCollection($magazines);
    }
}
