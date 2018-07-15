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

    public function isNotOnGenericTrial()
    {
        return !$this->onGenericTrial();
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
            ->create($stripeToken, [
                'email' => auth()->user()->email,
            ]);
    }

    public function currentPlan()
    {
        return $this->subscription(config('subscription.name'))->stripe_plan;
    }

    public function isOnTrial()
    {
        return $this->subscription(config('subscription.name'))->onTrial();
    }

    public function trialEndsAt()
    {
        return $this->subscription(config('subscription.name'))->trial_ends_at;
    }

    public function genericTrialHasEnded()
    {
        if ($this->trial_ends_at === null) {
            return false;
        }
        return $this->freshTimestamp()->gt($this->trial_ends_at);
    }

    public function cancelSubscription()
    {
        return $this->subscription(config('subscription.name'))->cancel();
    }

    public function updateQuantity($qty)
    {
        return $this->subscription(config('subscription.name'))->updateQuantity($qty);
    }

    public function getSubscriptionQuantityAttribute()
    {
        return $this->subscription(config('subscription.name'))->quantity;

    }

    public function startGenericTrial()
    {
        $this->trial_ends_at = now()->addDays(10);
        $this->save();
    }
}
