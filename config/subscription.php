<?php

return [
    'name' => 'main',
    'trial_days' => 10,
    'plans' => [
        [
            'stripe_id' => 'pro_monthly',
            'slug' => 'pro-monthly',
            'name' => 'Monthly',
            'price' => '$9.00',
            'interval' => 'Monthly',
            'active' => true,
            'has_free_trial' => true,
            'features' => [
                'Cool feature',
                'Another cool feature',
                '10 day free trial!',
                'Cancel any time.',
            ],
        ],
        [
            'stripe_id' => 'pro_yearly',
            'slug' => 'pro-yearly',
            'name' => 'Yearly',
            'price' => '$89.00',
            'interval' => 'Yearly',
            'active' => true,
            'has_free_trial' => true,
            'features' => [
                'Cool feature',
                'Another cool feature',
                '10 day free trial!',
                'Cancel any time.',
            ],
        ],
    ],
];
