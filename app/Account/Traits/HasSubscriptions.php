<?php

namespace App\Account\Traits;

trait HasSubscriptions
{
    public function isSubscribed()
    {
        return $this->subscribed('main');
    }

    public function isNotSubscribed()
    {
        return !$this->isSubscribed();
    }

    public function isCancelled()
    {
        return optional($this->subscription('main'))->cancelled();
    }

    public function isNotCancelled()
    {
        return !$this->isCancelled();
    }

    public function isCustomer()
    {
        return $this->hasStripeId();
    }

    public function createSubscription($plan, $stripeToken)
    {
        return $this->newSubscription(
            config('subscription.name'), $plan
        )->create($stripeToken, [
            'email' => auth()->user()->email,
        ]);
    }

    public function currentPlan()
    {
        return $this->subscription('main')->stripe_plan;
    }
}
