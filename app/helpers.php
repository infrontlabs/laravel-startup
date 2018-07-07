<?php

function link_is_active($path)
{
    return request()->is(trim($path, '/')) ? 'active' : '';
}

function role($id)
{
    $roles = config('team.roles');

    if (!array_key_exists($id, $roles)) {
        return $id;
    }

    return $roles[$id];
}

function plan($id)
{
    $plans = collect(config('subscription.plans'));
    $plan = $plans->firstWhere('stripe_id', $id);
    if (!$plan) {
        return $id;
    }
    return $plan['name'];

}
