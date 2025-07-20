<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most view files are stored in the resources/views directory; however, you are
    | free to define additional paths to look for views here.
    |
    */

    'paths' => [
        realpath(base_path('resources/views')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where the compiled Blade templates will be stored
    | for your application. Typically, this is within the storage/framework/views directory.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

    /*
    |--------------------------------------------------------------------------
    | View Component Paths
    |--------------------------------------------------------------------------
    |
    | This option configures the paths that contain Blade components.
    | Laravel will look inside these paths for components like:
    | <x-component-name />
    |
    | Add more paths if you store components outside of resources/views/components.
    |
    */

    'component.paths' => [
        resource_path('views/components'),
    ],

    /*
    |--------------------------------------------------------------------------
    | View Namespace Paths
    |--------------------------------------------------------------------------
    |
    | You can define custom view namespace paths here.
    | Example: 'admin' => resource_path('views/admin')
    |
    */

    'namespaces' => [
        // Example: 'emails' => resource_path('views/emails'),
    ],

    /*
    |--------------------------------------------------------------------------
    | View Extensions
    |--------------------------------------------------------------------------
    |
    | You may change the extensions that are used to identify view files.
    | This is useful if you want to use a different extension like .html or .tpl.
    |
    */

    'extensions' => ['blade.php', 'php', 'html'],

    /*
    |--------------------------------------------------------------------------
    | View Cache Enabled
    |--------------------------------------------------------------------------
    |
    | By default, Laravel caches your views once they're compiled. You may disable
    | this behavior if you're in development mode and want to always load fresh views.
    |
    */

    'cache' => env('VIEW_CACHE', true),

];