<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Enums\SocialiteProviders;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\SocialiteAuthenticationController;
use App\Models\AuthProvider;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('auth/{provider}/redirect', [SocialiteAuthController::class, 'index']);

Route::get('auth/{provider}/callback', [SocialiteAuthController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
