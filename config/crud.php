<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stubs Path
    |--------------------------------------------------------------------------
    |
    | The stubs path directory to generate crud. You may configure your
    | stubs paths here, allowing you to customize the own stubs of the
    | model,controller or view. Or, you may simply stick with the CrudGenerator defaults!
    |
    | Example: 'stub_path' => resource_path('stubs/')
    | Default: "default"
    | Files:
    |       Controller.stub
    |       Model.stub
    |       Request.stub
    |       views/
    |           bootstrap/
    |               create.stub
    |               edit.stub
    |               form.stub
    |               form-field.stub
    |               index.stub
    |               show.stub
    |               view-field.stub
    */

    'stub_path' => resource_path('views/stubs'),
    /*
    |--------------------------------------------------------------------------
    | Application Layout
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application layout. This value is used when creating
    | views for crud. Default will be the "layouts.app".
    |
    | layout = false or layout = null will not create the layout files.
    */

    'layout' => 'layouts.app',

    'model' => [
        'namespace' => 'App\Models\Superadmin',

        /*
         * Do not make these columns $fillable in Model or views
         */
        'unwantedColumns' => [
            'id',
            'uuid',
            'ulid',
            'password',
            'email_verified_at',
            'remember_token',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ],

    'controller' => [
        'namespace' => 'App\Http\Controllers\Superadmin',
        'apiNamespace' => 'App\Http\Controllers\Api',
    ],

    'resources' => [
        'namespace' => 'App\Http\Resources\views\Superadmin',
    ],

    'livewire' => [
        'namespace' => 'App\Livewire',
    ],

    'request' => [
        'namespace' => 'App\Http\Requests',
    ],
];
