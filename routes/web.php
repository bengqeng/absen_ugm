<?php

use App\Http\Controllers\Auth\ShowController;
use App\Http\Controllers\Auth\VerifyAuthController;
use Illuminate\Support\Facades\Route;

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
// Root path will redirect to login if needed
Route::redirect('/', '/login', 302);

Route::prefix('login')->group(function () {
    Route::get('/', [ShowController::class, 'index'])->name('auth.show');
    Route::post('/verify', [VerifyAuthController::class, 'verify'])->name('auth.verify');
});

// Logged in user admin/super admin
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('users', [App\Http\Controllers\User\ShowController::class, 'index'])->name('user_list.show');
        Route::get('user/{id}/detail', [App\Http\Controllers\User\DetailController::class, 'index'])->name('user_detail.show');
    });
});
// End Of Logged in user admin/super admin

// Logged in user staff
Route::group(['prefix' => 'staff', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('staff.dashboard.index');
    Route::resource('/attendance', App\Http\Controllers\User\AttendanceController::class)->names([
        'index' => 'staff.attendance.index'
    ]);
    Route::resource('/asset_submission', App\Http\Controllers\User\AssetSubmissionController::class)->names([
        'index' => 'staff.asset_submission.index'
    ]);
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class)->names([
        'index' => 'staff.profile.index'
    ]);
});
// End Of Logged in user staff
