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
            'stripe_id' => 'yearly_100',
            'name' => 'Basic (Annual)',
            'price' => '$100.00',
            'interval' => 'Yearly',
            'active' => true,
        ],
    ],
];
