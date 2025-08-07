<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = "subscription_plans";

    protected $fillable = [
        "name",
        "interval",
        "is_discounted",
        "price",
        "description",
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
