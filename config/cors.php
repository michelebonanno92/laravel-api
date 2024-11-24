<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */


    'paths' => ['
        api/*', 
        'sanctum/csrf-cookie'
    ],
    // il config\cors fa riferimento solo o a chiamata api o sanctum/csrf-cookie

    'allowed_methods' => ['*'],
    // esempio POST ecc...


    // co questo selezioniamo solo delle specifiche origini 
    'allowed_origins' => [
       env('FRONTEND_URL','http://localhost:5173',)
    //    'http://localhost:5173' oppure singolo
        
         // '*' = tutti
        // oppure che è la stessa cosa
        // 'http://121.0.0.1:5173',

    ],
        // consenti chiamata da tutte le parti 
    // 'allowed_origins' => ['*'],


    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
