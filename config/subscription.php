<?php

return [
    'name' => 'main',
    'trial_days' => 10,
    'plans' => [
        [
            'stripe_id' => null,
            'slug' => 'pro-monthly-free',
            'name' => 'Pro Free Trial',
            'price' => '$0.00',
            'interval' => 'Monthly',
            'active' => true,
            'is_free_trial' => true,
            'description' => 'Try us out for 10 days - No credit card required!',
            'features' => [
                'Cool feature',
                'Another cool feature',
                'Cancel any time.',
            ],
        ],
        [
            'stripe_id' => 'pro_monthly',
            'slug' => 'pro-monthly',
            'name' => 'Pro Monthly',
            'price' => '$9.00',
            'interval' => 'Monthly',
            'active' => true,
            'is_free_trial' => false,
            'description' => 'Some description',
            'features' => [
                'Cool feature',
                'Another cool feature',
                'Cancel any time.',
            ],
        ],
        [
            'stripe_id' => 'pro_yearly',
            'slug' => 'pro-yearly',
            'name' => 'Pro Yearly',
            'price' => '$89.00',
            'interval' => 'Yearly',
            'active' => true,
            'is_free_trial' => false,
            'description' => 'Some description',
            'features' => [
                'Cool feature',
                'Another cool feature',
                'Cancel any time.',
            ],
        ],
    ],
];
