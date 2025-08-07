<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Serie extends Model
{
    protected $table = "series";

    protected $fillable = [
        "name",
        "slug",
        "description",
        "cover_image",
        "row",
        "status"
    ];

    protected static function booted()
    {
        static::creating(function ($serie) {
            $serie->slug = Str::slug($serie->name);

            $originalSlug = $serie->slug;
            $i = 1;
            while (Serie::where('slug', $serie->slug)->exists()) {
                $serie->slug = $originalSlug . '-' . $i++;
            }
        });

        static::updating(function ($serie) {
            $serie->slug = Str::slug($serie->name);

            $originalSlug = $serie->slug;
            $i = 1;

            // Güncel haberin kendisi hariç kontrol et
            while (Serie::where('slug', $serie->slug)->where('id', '!=', $serie->id)->exists()) {
                $serie->slug = $originalSlug . '-' . $i++;
            }
        });
    }

    public function seasons()
    {
        return $this->hasMany(SerieSeason::class);
    }
}
