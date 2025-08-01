<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = "series";

    protected $fillable = [
        "name",
        "slug",
        "description",
        "row",
        "status"
    ];

    public function seasons()
    {
        return $this->hasMany(SerieSeason::class);
    }
}
