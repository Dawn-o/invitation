<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\LoveStoryController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return dd('HelloWorld(\'Print\')');
});


Route::get('/admin/dashboard', [IdentityController::class, 'index'])->name('dashboard');

// Admin Side Route
Route::resources([
    '/admin/identity' => IdentityController::class,
    '/admin/{identity_id}/agenda' => AgendaController::class,
    '/admin/{identity_id}/love-story' => LoveStoryController::class,
    '/admin/{identity_id}/quote' => QuoteController::class
]);

Route::get('/{identity_id}/', function () {
    return view('invitation_template');
});
