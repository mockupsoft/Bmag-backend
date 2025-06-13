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
        // Depolama yolu
        Storage::disk('s3')->put(
            'images/news/'.$fileName,
            $photoData
        );
        $url = Storage::disk('s3')->url('images/news/'.$fileName);
    }
}
