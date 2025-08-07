<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerieSeason extends Model
{
    protected $table = "serie_seasons";

    protected $fillable = [
        "serie_id",
        "name",
        "row"
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function sections()
    {
        return $this->hasMany(SerieSection::class, 'serie_season_id', 'id');
    }
}
