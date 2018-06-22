<?php

return [
    'name' => 'main',
    'plans' => [
        [
            'stripe_id' => 'basic',
            'slug' => 'basic',
            'name' => 'Monthly',
            'price' => '$10.00',
            'interval' => 'Monthly',
            'active' => true,
            'features' => [
                'Cool feature',
                'Another cool feature',
                'Cancel any time.',
            ],
        ],
        [
            'stripe_id' => 'yearly_100',
            'slug' => 'yearly',
            'name' => 'Yearly',
            'price' => '$100.00',
            'interval' => 'Yearly',
            'active' => true,
            'features' => [
                'Cool feature',
                'Another cool feature',
                'Cancel any time.',
            ],
        ],
    ],
];
