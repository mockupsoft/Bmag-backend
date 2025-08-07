<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SerieSection extends Model
{
    protected $table = "serie_sections";

    protected $appends = ['watched_seconds'];

    protected $fillable = [
        "serie_id",
        "serie_season_id",
        "name",
        "slug",
        "description",
        "cover_image",
        "views",
        "video_path",
        "locked"
    ];

    protected static function booted()
    {
        static::creating(function ($serieSection) {
            $serieSection->slug = Str::slug($serieSection->name);

            $originalSlug = $serieSection->slug;
            $i = 1;
            while (SerieSection::where('slug', $serieSection->slug)->exists()) {
                $serieSection->slug = $originalSlug . '-' . $i++;
            }
        });

        static::updating(function ($serieSection) {
            $serieSection->slug = Str::slug($serieSection->name);

            $originalSlug = $serieSection->slug;
            $i = 1;

            // Güncel haberin kendisi hariç kontrol et
            while (SerieSection::where('slug', $serieSection->slug)->where('id', '!=', $serieSection->id)->exists()) {
                $serieSection->slug = $originalSlug . '-' . $i++;
            }
        });
    }

    public function userProgress()
    {
        return $this->hasOne(EpisodeProgress::class, 'episode_id', 'id')
            ->where('user_id', Auth::id());
    }
}
