<?php

use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\AssetSubmissionController;
use App\Http\Controllers\Admin\Settings\IpController;
use App\Http\Controllers\Admin\UserAssetSubmissionController;
use App\Http\Controllers\Auth\ShowController;
use App\Http\Controllers\Auth\VerifyAuthController;
use App\Models\AssetCategory;
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
    Route::get('/log-out', [VerifyAuthController::class, 'logout'])->name('auth.logout');
});

// Logged in user admin/super admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('attendance', [App\Http\Controllers\Admin\UserAttendanceController::class, 'index'])->name('admin.attendance.index');
    Route::resource('asset', App\Http\Controllers\Admin\AssetController::class)->names([
        'index' => 'admin.asset.index',
        'create' => 'admin.asset.create',
        'store' => 'admin.asset.store',
    ]);
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile.index');
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
    ]);
    Route::resource('project', \App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'admin.project.index',
        'create' => 'admin.project.create',
        'store' => 'admin.project.store',
        'edit' => 'admin.project.edit',
        'update' => 'admin.project.update',
    ]);
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('ip', IpController::class)->names([
            'index' => 'admin.settings.ip.index',
            'create' => 'admin.settings.ip.create',
            'store' => 'admin.settings.ip.store',
            'edit' => 'admin.settings.ip.edit',
            'update' => 'admin.settings.ip.update',
        ]);
    });
    Route::resource('asset_submission', AssetSubmissionController::class)->names([
        'index' => 'admin.asset_submission.index',
        'create' => 'admin.asset_submission.create',
        'store' => 'admin.asset_submission.store',
        'edit' => 'admin.asset_submission.edit',
        'update' => 'admin.asset_submission.update',
        'destroy' => 'admin.asset_submission.destroy',
    ]);
    Route::resource('asset_category', AssetCategoryController::class)->names([
        'index' => 'admin.asset_category.index',
        'create' => 'admin.asset_category.create',
        'store' => 'admin.asset_category.store',
        'edit' => 'admin.asset_category.edit',
        'update' => 'admin.asset_category.update',
        'destroy' => 'admin.asset_category.destroy',
    ]);
    Route::scopeBindings()->group(function () {
        Route::resource('user.asset_submission', UserAssetSubmissionController::class)->names([
            'index' => 'admin.user.asset_submission.index',
            'create' => 'admin.user.asset_submission.create',
            'store' => 'admin.user.asset_submission.store',
            'edit' => 'admin.user.asset_submission.edit',
            'update' => 'admin.user.asset_submission.update',
            'destroy' => 'admin.user.asset_submission.destroy',
        ]);
    });
});
// End Of Logged in user admin/super admin

// Logged in user staff
Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'staff']], function () {
    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('staff.dashboard.index');
    Route::resource('/attendance', App\Http\Controllers\User\AttendanceController::class)->names([
        'index' => 'staff.attendance.index',
    ]);
    Route::resource('/asset_submission', App\Http\Controllers\User\AssetSubmissionController::class)->names([
        'index' => 'staff.asset_submission.index',
    ]);
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class)->names([
        'index' => 'staff.profile.index',
    ]);
    Route::resource('/check-in', App\Http\Controllers\User\CheckinController::class)->names([
        'create' => 'staff.checkin.create',
        'store' => 'staff.checkin.store',
    ]);
    Route::resource('/check-out', App\Http\Controllers\User\CheckOutController::class)->names([
        'create' => 'staff.checkout.create',
        'store' => 'staff.checkout.store',
    ]);
});
// End Of Logged in user staff
