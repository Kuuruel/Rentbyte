<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // default guard untuk superadmin
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        // Guard untuk superadmin / user biasa
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard khusus tenant
        'tenant' => [
            'driver' => 'session',
            'provider' => 'tenants',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        // Superadmin / user default
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Tenant provider
        'tenants' => [
            'driver' => 'eloquent',
            'model' => App\Models\Tenant::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        // Password reset untuk superadmin
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60, // menit
            'throttle' => 60,
        ],

        // Password reset untuk tenant
        'tenants' => [
            'provider' => 'tenants',
            'table' => 'tenant_password_reset_tokens', // bikin tabel ini sendiri
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
