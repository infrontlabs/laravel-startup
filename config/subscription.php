<?php

return [
    'name' => 'main',
    'plans' => [
        [
            'stripe_id' => 'basic',
            'name' => 'Basic',
            'price' => '$10.00',
            'interval' => 'Monthly',
            'active' => true,
        ],
        [
            'stripe_id' => 'basic_yearly',
            'name' => 'Basic (Annual)',
            'price' => '$100.00',
            'interval' => 'Yearly',
            'active' => true,
        ],
    ],
];
