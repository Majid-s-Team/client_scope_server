<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppContentController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KpiGroupController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UserPinController;
use App\Http\Controllers\Api\TerritoryController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\CustomFieldController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\UserTrackingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API routes for the application. Public routes are accessible without
| authentication, while protected routes use Sanctum authentication.
|
*/

// Public routes
Route::get('page/{name}', [AppContentController::class, 'index']);
Route::post('company-register', [CompanyController::class, 'register']);
Route::get('app-data', [GeneralController::class, 'appData']);

// Protected routes with ApiAuthorization middleware
Route::middleware(['ApiAuthorization'])->group(function () {

    // Authentication & public user APIs
    Route::post('user/subscribe', [UserController::class, 'userSubscribe']);
    Route::post('user/login', [UserController::class, 'login']);
    Route::post('user/forgot-password', [UserController::class, 'forgotPassword']);
    Route::post('user/social', [UserController::class, 'socialLogin']);

    // Sanctum-protected routes
    Route::middleware(['auth:sanctum'])->group(function () {

        // User profile & password
        Route::post('user/change-password', [UserController::class, 'changePassword']);
        Route::post('user/logout', [UserController::class, 'logout']);
        Route::get('user/leader-board', [UserController::class, 'leaderBoard']);
        Route::get('user/notification/badge', [UserController::class, 'getNotificationBadge']);
        Route::get('user/company-metric', [UserController::class, 'getCompanyMetric']);

        // Manage users with permission
        Route::get('user/manage-users', [UserController::class, 'getManageUsers'])->middleware('user_permission:manage_user');

        // Resourceful routes
        Route::resource('user', UserController::class)->except(['destroy']);
        Route::resource('kpi-group', KpiGroupController::class)->only(['index']);
        Route::resource('team', TeamController::class)->middleware('user_permission:team');
        Route::resource('status', StatusController::class)->middleware('user_permission:status');
        Route::resource('user-pin', UserPinController::class);
        Route::resource('territory', TerritoryController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::get('appointment/get-days', [AppointmentController::class, 'getDays']);
        Route::resource('faq', FaqController::class)->only('index');
        Route::resource('custom-fields', CustomFieldController::class)->only('index');

        // Notification routes
        Route::delete('notification/{id}', [NotificationController::class, 'deleteNotification']);
        Route::get('notification', [NotificationController::class, 'index'])->name('notification.list');
        Route::post('notification/setting', [NotificationController::class, 'notificationSetting'])->name('notification.setting');
        Route::get('notification/setting', [NotificationController::class, 'getNotificationSetting'])->name('notification.settings');

        // Data truncate
        Route::post('truncate-all-data', [GeneralController::class, 'truncateAllData']);
        Route::post('truncate-chat-data', [GeneralController::class, 'truncateChatData']);

        // Chat notifications
        Route::post('chat/send-notification', [ChatController::class, 'sendNotification']);

        // User tracking
        Route::get('user-tracking/dates', [UserTrackingController::class, 'getTrackingDates']);
        Route::resource('user-tracking', UserTrackingController::class)->only(['store', 'index']);
    });
});
