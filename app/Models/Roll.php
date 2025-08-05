<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    protected $table = "rolls";

    protected $fillable = [
        "magazine_id",
        "path",
        "description"
    ];

    protected $appends = ['liked'];

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

    public function getLikedAttribute()
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        return RollView::query()
            ->where('roll_id', $this->id)
            ->where('user_id', $user->id)
            ->exists();
    }
}
