<?php

function link_is_active($path)
{
    return request()->is($path) ? 'active' : '';
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
    $plans = config('subscription.plans');

    if (!array_key_exists($id, $plans)) {
        return $id;
    }

    return $plans[$id];
}
