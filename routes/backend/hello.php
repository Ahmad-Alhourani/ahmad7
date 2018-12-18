<?php

/**
 * Hello Management
 * All route names are prefixed with 'admin.hello'.
 */
Route::group(
    [
        'namespace' => 'Hello',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Hello CRUD
         */
        Route::resource('hello', 'HelloController');
    }
);
