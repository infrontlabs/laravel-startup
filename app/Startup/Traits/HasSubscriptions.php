<?php

namespace Startup\Traits;

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
        )
            ->trialDays(config('subscription.trial_days'))
            ->create($stripeToken, [
                'email' => auth()->user()->email,
            ]);
    }

    public function currentPlan()
    {
        return $this->subscription('main')->stripe_plan;
    }

    public function isOnTrial()
    {
        return $this->subscription('main')->onTrial();
    }

    public function trialEndsAt()
    {
        return $this->subscription('main')->trial_ends_at;
    }

    public function cancelSubscription()
    {
        return $this->subscription('main')->cancel();

    }
}
