<?php

namespace App;

use App\Account\Models\Document;
use App\Account\Traits\HasSubscriptions;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Account extends Model
{
    use Billable,
        HasSubscriptions;

    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function createSubscription($plan, $stripeToken)
    {
        return $this->newSubscription(
            config('subscription.name'), $plan
        )->create($stripeToken);
    }

}
