<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $table = "plan_features";

    protected $fillable = [
        "subscription_plan_id",
        "feature"
    ];
}
