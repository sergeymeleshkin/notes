<?php

use App\Http\Controllers\Api\Forms\FeedbackFormController;
use App\Http\Controllers\Api\GroupUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::name('forms.')->prefix('forms')->group(function() {
    Route::resource('feedback', FeedbackFormController::class)->withTrashed();
});

Route::name('groups.')->prefix('groups')->group(function() {
    Route::resource('users', GroupUsersController::class)->withTrashed();
});
