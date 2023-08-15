<?php

return [
    'Quantity' => 'Quantity',
    'Total' => 'Total (:totalQuantity products)',
    'Payment Method' => 'Payment Method',
    'index' => [
        'title' => 'Orders',
    ],
    'show' => [
        'title' => 'Order #:id',
    ],
    'create' => [
        'title' => 'Create order',
        'cart' => [
            'required' => 'Cart item is required',
        ],
    ],
    'store' => [
        'fail' => 'Something went wrong when creating order',
        'success' => 'Order created successfully',
    ],
];
