<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpisodeProgress extends Model
{
    protected $table = "episode_progress";

    protected $fillable = [
        "user_id",
        "episode_id",
        "watched_seconds"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episode()
    {
        return $this->belongsTo(SerieSection::class, 'id', 'episode_id');
    }
}
