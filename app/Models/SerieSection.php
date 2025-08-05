<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function userProgress()
    {
        return $this->hasOne(EpisodeProgress::class, 'episode_id', 'id')
            ->where('user_id', Auth::id());
    }
}
