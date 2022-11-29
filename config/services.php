<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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

    'facebook' => [
        'client_id'     => '1310568986345524',
        'client_secret' => '46c967bdc476acb0046ab5bcefe5ae79',
        'redirect'      => 'http://127.0.0.1:8000/login/facebook/callback',
        'android'       => [
            'app_id' => env('FACEBOOK_APP_ID_ANDROID'),
        ],
        'ios'           => [
            'app_id' => env('FACEBOOK_APP_ID_IOS'),
        ],
    ],

    'google' => [
        'client_id'     => "913898466331-snd1kpogjmdk41qe1pvdnvnohuvugb0d.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect'      => "http://127.0.0.1:8000/login/google/callback",        
    ],
];

