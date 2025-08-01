<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerieSection extends Model
{
    protected $table = "serie_sections";

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
}
