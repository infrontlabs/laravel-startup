<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans = collect(config('subscription.plans'))->where('active', true);

        return view('plans.index', compact('plans'));
    }

    public function subscribe($plan)
    {
        $plans = collect(config('subscription.plans'))->where('active', true);
        $selectedPlan = $plans->where('slug', $plan)->first();

        if (!$selectedPlan) {
            return redirect()->route('plans.index');
        }

        return view('plans.subscribe', compact('plans', 'selectedPlan'));
    }
}
