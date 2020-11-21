<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '175348541284-j8hjk18atvmi4o9bh6pt2cfoqn899289.apps.googleusercontent.com',
        'client_secret' => 'DhyF29ux53R2E7bmyB0LeCMf',
        'redirect' => 'https://ziksales.com/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '661231494428466',
        'client_secret' => 'dd0a741c3b5f68ff3f72f700937f5328',
        'redirect' => 'https://ziksales.com/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'iFEx3tsVNN3hRNP0ptqIfRZ3H',
        'client_secret' => 'B0lFsuypCwiKtt6OGI8KiG7l9klrLYEfMSes502kQw9WZIT8kf',
        'redirect' => 'https://ziksales.com/login/twitter/callback',
    ],

];
