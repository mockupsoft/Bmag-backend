<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RollLike extends Model
{
    protected $table = "roll_likes";

    protected $fillable = [
        "user_id",
        "roll_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
