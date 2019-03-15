<?php

// Authentication.
Route::post('/auth', 'AuthController@authenticate');
Route::post('/recover', 'AuthController@recoverPassword');
Route::post('/register', 'AuthController@register');

Route::group(
    [
        'middleware' =>
            [
                'jwt.auth',
            ],
    ], function ()
        {   // User methods
            Route::get('/get-logged-user', 'UserController@getLoggedUser');
            Route::get('/get-states-external', 'StateController@getStatesExternal');
            Route::get('/get-cities-external/{state_id}', 'CityController@getCitiesExternal');
        }
);
