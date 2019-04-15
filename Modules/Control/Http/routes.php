<?php

// Authentication.
Route::group([
    'prefix' => 'api',
], function () {
    // Authentication.
    Route::post('/auth', 'AuthController@authenticate');
    Route::post('/recover', 'AuthController@recoverPassword');

    Route::group([
        'middleware' => ['jwt.auth'],
    ], function () {
        Route::get('/get-logged-user', 'UserController@getLoggedUser');
        Route::get('/get-states-external', 'StateController@getStatesExternal');
        Route::get('/get-cities-external/{state_id}', 'CityController@getCitiesExternal');

    });
});
