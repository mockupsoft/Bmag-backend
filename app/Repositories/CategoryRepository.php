<?php


namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryRepository
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        return $this
            ->category
            ->newQuery()
            ->where('is_active', true)
            ->orderBy('order', 'ASC')
            ->get();
    }

    public function create()
    {

    }
}
