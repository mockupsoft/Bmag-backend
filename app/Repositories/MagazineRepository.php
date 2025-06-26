<?php

namespace App\Repositories;

use App\Models\Magazine;
use App\Models\MagazineIssue;

class MagazineRepository
{
    private Magazine $magazine;
    private MagazineIssue $magazineIssue;

    public function __construct(Magazine $magazine, MagazineIssue $magazineIssue)
    {
        $this->magazine = $magazine;
        $this->magazineIssue = $magazineIssue;
    }

    public function getMagazines()
    {
        return $this->magazine->get();
    }

    public function getMagazineIssues($magazine)
    {
        return $this
            ->magazineIssue
            ->query()
            ->where('magazine_id', $magazine->id)
            ->paginate(10);
    }

    public function getMagazineForSlug($magazineSlug)
    {
        return $this->magazine->query()->where('slug', $magazineSlug)->first();
    }

    public function getMagazineIssue($magazineIssueSlug)
    {
        return $this->magazineIssue->query()->where('slug', $magazineIssueSlug)->first();
    }

    public function getMagazineIssueForIssueDate($magazineIssueIssueDate)
    {
        return $this->magazineIssue->query()->where('issue_date', $magazineIssueIssueDate)->first();
    }
}
