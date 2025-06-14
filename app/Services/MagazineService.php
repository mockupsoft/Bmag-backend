<?php

namespace App\Services;

use App\Repositories\MagazineRepository;

class MagazineService
{
    private MagazineRepository $magazineRepository;

    public function __construct(MagazineRepository $magazineRepository)
    {
        $this->magazineRepository = $magazineRepository;
    }

    public function getMagazines()
    {
        return $this->magazineRepository->getMagazines();
    }
}
