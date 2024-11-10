<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OAuthController;

Route::get('/oauth/authorize', [OAuthController::class, 'oauthAuthorize'])->middleware('auth');
Route::post('/oauth/authorize', [OAuthController::class, 'approve'])->middleware('auth');
Route::get('/oauth/token', [OAuthController::class, 'token']);

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
    return view('welcome');
});
