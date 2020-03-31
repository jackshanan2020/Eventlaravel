<?php

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/profile', 'Auth\ProfileController@index')->name('profile');
    Route::post('user/profile', 'Auth\ProfileController@store')->name('profile-save');

    /**
     * Event related routes
     */
    $eventsController = "\App\Modules\Event\Http\Controllers\EventsController";
    Route::get('events', "{$eventsController}@index")->name('events');
    Route::get('events/add', "{$eventsController}@add")->name('event-add');
    Route::post('events/save', "{$eventsController}@store")->name('event-save');
    Route::get('events/view/{event}', "{$eventsController}@view")->name('event-view');
    Route::post('search-events', "{$eventsController}@searchEvents")->name('search-events');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
