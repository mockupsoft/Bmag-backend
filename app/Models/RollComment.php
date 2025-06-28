<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RollComment extends Model
{
    protected $table = "roll_comments";

    protected $fillable = [
        "user_id",
        "roll_id",
        "comment",
        "approved_at",
        "approved_by",
        "ip"
    ];

    public function roll()
    {
        return $this->belongsTo(Roll::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
