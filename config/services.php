<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => '475101103353942',
        'client_secret' => '5c263d3fbb3b58e141e74496f0c6115a',
        'redirect' => 'https://www.knshop.kitenepal.com/client/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '965239064784-ns8cp9m3qeo4jkl5glq8o8cbkahjn3d9.apps.googleusercontent.com',
        'client_secret' => 'BF5uDgPdPr9SGzQu-wNEb-Qw',
        'redirect' => 'https://www.knshop.kitenepal.com/client/login/google/callback',
    ],

    'twitter' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => 'http://localhost/KNshop/client/login/twitter/callback',
    ],

];
