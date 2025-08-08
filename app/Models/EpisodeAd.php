<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpisodeAd extends Model
{
    protected $table = "episode_ads";

    protected $fillable = [
        "episode_id",
        "second",
        "title",
        "url",
        "image",
        "price",
    ];

    public function episode()
    {
        return $this->belongsTo(SerieSection::class, 'episode_id', 'id');
    }
}
