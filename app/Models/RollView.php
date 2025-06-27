<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RollView extends Model
{
    protected $table = "roll_views";

    protected $fillable = [
        "user_id",
        "roll_id",
        "viewed_at"
    ];
}
