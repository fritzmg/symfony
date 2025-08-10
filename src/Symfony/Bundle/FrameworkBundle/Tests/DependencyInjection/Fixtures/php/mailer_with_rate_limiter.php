<?php

$container->loadFromExtension('framework', [
    'annotations' => false,
    'http_method_override' => false,
    'handle_all_throwables' => true,
    'php_errors' => ['log' => true],
    'rate_limiter' => [
        'foo_limiter' => [
            'lock_factory' => null,
            'policy' => 'token_bucket',
            'limit' => 10,
            'rate' => ['interval' => '5 seconds', 'amount' => 10],
        ],
    ],
    'mailer' => [
        'transports' => [
            'main' => [
                'dsn' => 'smtp://example.com',
                'rate_limiter' => 'foo_limiter',
            ],
        ],
    ],
]);
