<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\LoveStoryController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return dd('HelloWorld(\'Print\')');
});

Route::get('/{identity_id}/', function () {
    return view('main.invitation_template');
});

// Auth Route
Route::controller(AuthController::class)->group(function () {
    Route::get('/admin/login', 'index');
    Route::post('/admin/login', 'login')->name('login');
    Route::get('admin/logout', 'logout')->name('logout')->middleware('auth');
});

// Admin Side Route 
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [IdentityController::class, 'index'])->name('dashboard');
    Route::resources([
        '/admin/identity' => IdentityController::class,
        '/admin/{identity_id}/agenda' => AgendaController::class,
        '/admin/{identity_id}/love_story' => LoveStoryController::class,
        '/admin/{identity_id}/quote' => QuoteController::class,
        '/admin/{identity_id}/gallery' => GalleryController::class
    ]);
});
