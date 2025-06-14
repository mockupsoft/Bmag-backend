<?php

namespace App\Repositories;

use App\Models\Magazine;

class MagazineRepository
{
    private Magazine $magazine;

    public function __construct(Magazine $magazine)
    {
        $this->magazine = $magazine;
    }

    public function getMagazines()
    {
        return $this->magazine->get();
    }
}
