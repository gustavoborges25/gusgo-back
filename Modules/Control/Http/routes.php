<?php

// Authentication.
Route::post('/auth', 'AuthController@authenticate');
Route::post('/recover', 'AuthController@recoverPassword');
Route::post('/register', 'AuthController@register');

Route::group(
    [
        'middleware' =>
            [
                'permissions',
                'jwt.auth',
            ],
    ], function ()
        {   // User methods
            Route::get('/get-logged-user', 'UserController@getLoggedUser');
        }
);
