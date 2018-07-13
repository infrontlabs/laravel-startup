<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans = collect(config('subscription.plans'))->where('active', true);

        if (request()->account() && (request()->account()->onGenericTrial() || request()->account()->genericTrialHasEnded())) {
            $plans = $plans->where('is_free_trial', false);
        }

        return view('plans.index', compact('plans'));
    }

    public function subscribe($plan)
    {
        $plans = collect(config('subscription.plans'))
            ->where('active', true);

        $selectedPlan = $plans->where('slug', $plan)->first();

        if (!$selectedPlan) {
            return redirect()->route('plans.index');
        }

        if ($selectedPlan['is_free_trial'] && request()->account()->onGenericTrial()) {
            return redirect()->route('account.index');
        }

        $paidPlans = collect(config('subscription.plans'))
            ->where('active', true)
            ->where('is_free_trial', false);

        if ($selectedPlan['is_free_trial'] && request()->account()->genericTrialHasEnded()) {
            return redirect()->route('plans.subscribe', $paidPlans->first()['slug'])->withWarning('Your free trial has ended. Please choose a paid plan.');
        }

        return view('plans.subscribe', compact('paidPlans', 'selectedPlan'));
    }
}
