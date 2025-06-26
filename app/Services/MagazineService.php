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

    public function getMagazineIssues($magazine)
    {
        return $this->magazineRepository->getMagazineIssues($magazine);
    }

    public function getMagazineForSlug($magazineSlug)
    {
        return $this->magazineRepository->getMagazineForSlug($magazineSlug);
    }

    public function getMagazineIssue($magazineIssueSlug)
    {
        return $this->magazineRepository->getMagazineIssue($magazineIssueSlug);
    }

    public function getMagazineIssueForIssueDate($magazineIssueIssueDate)
    {
        return $this->magazineRepository->getMagazineIssueForIssueDate($magazineIssueIssueDate);
    }
}
