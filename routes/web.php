<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'IsManager'], function () {
        Route::get('applications', function () {
            return 'list of applications';
        });
    });
});

require __DIR__ . '/auth.php';
