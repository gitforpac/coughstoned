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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '158115108265046',
    'client_secret' => '917733a26bbffc066cd3ab7fc94c2c22',
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
    'client_id' => '847124853894-06hkc2viqpgbhm5a95ipsa303413eqg0.apps.googleusercontent.com',
    'client_secret' => 'q-7hpCqHB6GVRc8z78YAabk2',
    'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
