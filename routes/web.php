<?php

use App\Http\Controllers\ApplicationsController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'IsManager'], function () {
        Route::resource('applications', ApplicationsController::class)->except('create', 'store');
    });

    Route::resource('applications', ApplicationsController::class)->only('create', 'store');
});

require __DIR__ . '/auth.php';
