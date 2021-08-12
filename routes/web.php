<?php

use App\Http\Controllers\ApplicationsController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'IsManager'], function () {
        Route::get('applications/{application}/answer', [ApplicationsController::class, 'answer'])->name('applications.answer');
        Route::get('applications', [ApplicationsController::class, 'index'])->name('applications.index');
        Route::get('applications/{application}', [ApplicationsController::class, 'show'])->name('applications.show');
    });

    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('applications/create', [ApplicationsController::class, 'create'])->name('applications.create');
    Route::post('applications', [ApplicationsController::class, 'store'])->name('applications.store');

});

require __DIR__ . '/auth.php';
