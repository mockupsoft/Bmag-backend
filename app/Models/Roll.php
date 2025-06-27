<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    protected $table = "rolls";

    protected $fillable = [
        "magazine_id",
        "path",
        "description"
    ];

    public function magazine()
    {
        return $this->hasOne(Magazine::class, 'id', 'magazine_id');
    }

    public function likes()
    {
        return $this->hasMany(RollLike::class);
    }

    public function comments()
    {
        return $this->hasMany(RollComment::class)->whereNotNull('approved_at');
    }
}
