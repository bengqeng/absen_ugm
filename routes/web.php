<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ShowController;
use App\Http\Controllers\Auth\VerifyAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
# Root path will redirect to login if needed
Route::redirect('/', '/login/page', 302);

Route::prefix('login')->group(function () {
    Route::get('/page', [ShowController::class, 'index'])->name('auth.show');
    Route::post('/verify', [VerifyAuthController::class, 'verify'])->name('auth.verify');
});

# Logged in user
Route::group(['middleware' => ['auth']], function () {
    #Admin and Super Admin Level
    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('users', [App\Http\Controllers\User\ShowController::class, 'index'])->name('user_list.show');
    });
});

# TESTING ROUTE
# Can be accessed admin / super admin only
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('tes', function(){
        echo 'Executed';
    });
});
# End of TESTING ROUTE
