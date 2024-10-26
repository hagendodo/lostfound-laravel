<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoundedItemController;
use App\Http\Controllers\SearchHistoryController;
use App\Http\Controllers\ClaimHistoryController;
use App\Http\Middleware\CheckAuth;
use App\Models\FoundedItem;

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([CheckAuth::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Founded Items Routes
    Route::resource('founded-items', FoundedItemController::class);

    // Search Histories Routes
    Route::resource('search-histories', SearchHistoryController::class);

    // Claim Histories Routes
    Route::resource('claim-histories', ClaimHistoryController::class);
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/search', function () {
    return view('services.index');
})->name('search');

Route::post('/search-found', function () {
    $foundedItems = FoundedItem::all();
    return view('services.search', compact('foundedItems'));
})->name('search_found');
