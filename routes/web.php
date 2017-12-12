<?php

Route::get('/', function () {
    return view('travelers.index');
})->name('index');

Route::get('/units', 'TravelerController@search')->name('search');
Route::get('/units/{id}', 'TravelerController@show')->name('show');

Route::get('/list-your-properties', function(){
    return view('list');
})->name('list');

Route::get('/list-your-properties/step-one', 'managers\ListController@stepOne')->name('list.step.one');

Route::post('/list-your-properties/step-two', 'managers\ListController@stepTwo')->name('list.step.two');

Route::post('/list-your-properties/step-three', 'managers\ListController@stepThree')->name('list.step.three');

Route::post('/list-your-properties/step-four', 'managers\ListController@stepFour')->name('list.step.four');

Route::get('/terms-of-service', function(){
    return view('auth.manager_register.terms');
})->name('terms');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * CYBERSYTES ROUTES
 */
Route::prefix('cysy')->namespace('cysy')->middleware(['role:cysy'])->group(function()
{
    Route::get('/', function(){
        return view('cysy.index');
    })->name('cysy.dashboard');

    Route::resource('companies', 'CompanyController', ['as' => 'cysy']);
    Route::resource('users', 'UserController', ['as' => 'cysy']);
});

/**
 * MANAGER ROUTES
 */
Route::prefix('manage')->namespace('managers')->middleware('role:managers')->group(function(){

    Route::get('/', function(){
        return view('managers.index');
    })->name('managers.dashboard');

    Route::resource('complexes', 'ComplexController', ['as' => 'managers']);
    Route::post('complexes/axios-photo-reorder', 'ComplexController@axiosPhotoReorder')->name('managers.axios.complexes.photos.reorder');
    Route::resource('units', 'UnitController', ['as' => 'managers']);
    Route::post('units/axios-photo-reorder', 'UnitController@axiosPhotoReorder')->name('managers.axios.units.photos.reorder');
    Route::resource('rates', 'RateController', ['as' => 'managers']);
    Route::resource('users', 'UserController', ['as' => 'managers']);

    Route::get('/settings', 'SettingsController@index')->name('managers.settings.index');
    // Route::resource('reservations', 'ReservationController', ['as' => 'managers']);
});

/**
 * OWNER ROUTES
 */
Route::prefix('owner')->middleware('role:owners')->group(function(){
    Route::get('/', function(){
        return view('owners.index');
    })->name('owners.dashboard');
});
