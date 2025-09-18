<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanySalesController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserPinController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\CustomFieldsController;
use App\Http\Controllers\Admin\ImportHistoryController;
use App\Http\Controllers\Admin\UserTrackController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TransactionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('user/verify/{tablename}/{email}', [UserController::class, 'verifyUser'])
    ->name('verify-email');

Route::get('content/{slug}', [HomeController::class, 'getContent']);

Route::view('admin/privacy-policy/index', 'admin.privacy-policy.index');
Route::view('admin/terms-condition/index', 'admin.terms-condition.index');

Route::middleware(['logging:web'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->group(function () {

        Route::middleware(['guest'])->group(function () {
            Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('admin.login');
            Route::match(['get', 'post'], 'forgot-password', [AdminController::class, 'forgotPassword'])->name('admin.forgot-password');
            Route::match(['get', 'post'], 'reset-password/{tablename}/{email}', [UserController::class, 'resetPassword'])->name('user-password-reset');
        });

        Route::post('upgrade-subscription', [SubscriptionController::class, 'upgradePackage'])->name('admin.upgrade-package');

        Route::middleware(['auth:web'])->group(function () {

            // FAQ
            Route::get('faq-content', [AdminFaqController::class, 'index'])->name('admin-faq-index');
            Route::post('faq-content', [AdminFaqController::class, 'store'])->name('admin.save-faq');
            Route::post('admin-faq-delete', [AdminFaqController::class, 'faqDelete'])->name('admin-faq-delete');

            // Content
            Route::post('app-content/update', [AdminContentController::class, 'update'])->name('admin-content-update');
            Route::get('app-content', [AdminContentController::class, 'index'])->name('admin-content-index');
            Route::get('app-content/edit-content', [AdminContentController::class, 'editContent'])->name('admin-content-edit');

            // Dashboard
            Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('sr-kpi-targets', [DashboardController::class, 'getSRKpiTargets'])->name('admin.dashboard.kpi-targets');
            Route::get('dashboard/leader-board', [DashboardController::class, 'getLeaderBoard'])->name('admin.dashboard.leader-board');
            Route::get('dashboard/knock-time-chart', [DashboardController::class, 'getUserKnockTime'])->name('admin.dashboard.knock-time');
            Route::get('dashboard/knock-day-chart', [DashboardController::class, 'getUserKnockDay'])->name('admin.dashboard.knock-day');
            Route::get('dashboard/kpi-group-performance', [DashboardController::class, 'getKpiGroupPerformance'])->name('admin.dashboard.kpi-group-performance');
            Route::get('dashboard/metric-group-performance', [DashboardController::class, 'getMetricPerformance'])->name('admin.dashboard.metric-performance');
            Route::get('dashboard/team-performance', [DashboardController::class, 'getTeamPerformance'])->name('admin.dashboard.team-performance');
            Route::get('dashboard/top-widget', [DashboardController::class, 'topWidget'])->name('admin.dashboard.top-widget');
            Route::get('dashboard/territory-performance', [DashboardController::class, 'territoryPerforamance'])->name('admin.dashboard.territory-performance');

            // Company Sales
            Route::match(['get', 'post'], 'company-sales', [CompanySalesController::class, 'index'])
                ->name('admin.company-sales')->middleware(['web_user_permission:company-sales']);

            // Profile
            Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');
            Route::post('update-profile', [AdminController::class, 'updateProfile'])->name('admin.update-profile');

            // Users
            Route::match(['get', 'post'], 'add-user', [AdminUserController::class, 'addUser'])
                ->name('admin.add-user')->middleware(['user_permission:manage_user']);
            Route::post('edit-user/{id}', [AdminUserController::class, 'updateUser'])
                ->name('admin.update-user')->middleware(['user_permission:manage_user']);

            Route::post('user-pin/export-data', [UserPinController::class, 'exportData'])->name('admin.userpins.export');
            Route::post('user-pin/export-file', [UserPinController::class, 'exportDeleteFile'])->name('admin.userpins.delete-export-file');
            Route::post('user/pins', [UserPinController::class, 'ajaxListing'])->name('admin.userpins.list');
            Route::match(['get', 'post'], 'add-pin', [UserPinController::class, 'addPin'])->name('admin.add-pin');
            Route::get('user-pin', [UserPinController::class, 'index'])->name('admin.user-pin');
            Route::match(['get', 'post'], 'user-pin/edit/{id}', [UserPinController::class, 'editPin'])->name('admin.user-pin.update');
            Route::post('user-pin/delete', [UserPinController::class, 'deletePin'])->name('admin.user-pin.delete');

            // Map
            Route::get('map', [MapController::class, 'index'])->name('admin.map');
            Route::get('map/get-pins', [MapController::class, 'getPins'])->name('admin.map.getPins');
            Route::post('territory/save', [MapController::class, 'saveTerritory'])->name('admin.territory.save');
            Route::get('territory/get', [MapController::class, 'getTerritory'])->name('admin.territory.get');
            Route::post('territory/update', [MapController::class, 'updateTerritory'])->name('admin.territory.update');
            Route::post('territory/delete', [MapController::class, 'territoryDelete'])->name('admin.territory.delete');

            // Appointments
            Route::match(['get', 'post'], 'add-appointment', [AppointmentController::class, 'addAppointment'])->name('admin.add-appointment');
            Route::match(['get', 'post'], 'edit-appointment', [AppointmentController::class, 'editAppointment'])->name('admin.edit-appointment');
            Route::get('calendar', [AppointmentController::class, 'index'])->name('admin.calender');

            // Status
            Route::match(['get', 'post'], 'add-status', [StatusController::class, 'addStatus'])->name('admin.add-status')->middleware(['web_user_permission:status']);
            Route::match(['get', 'post', 'delete'], 'edit-status', [StatusController::class, 'editStatus'])->name('admin.edit-status')->middleware(['web_user_permission:status']);
            Route::get('statuses', [StatusController::class, 'index'])->name('admin.statuses')->middleware(['web_user_permission:status']);

            // Team
            Route::match(['get', 'post'], 'add-team', [TeamController::class, 'addTeam'])->name('admin.add-team')->middleware(['web_user_permission:team']);
            Route::match(['get', 'post', 'delete'], 'edit-team', [TeamController::class, 'editTeam'])->name('admin.edit-team')->middleware(['web_user_permission:team']);
            Route::get('team', [TeamController::class, 'index'])->name('admin.team')->middleware(['web_user_permission:team']);

            // Chat
            Route::get('chat', [ChatController::class, 'index'])->name('admin.chat');

            // User Suggestions / Leaderboard
            Route::get('user/suggestion', [AdminUserController::class, 'userSuggestion'])->name('admin.user.suggestion');
            Route::get('user/leader-board', [AdminUserController::class, 'leaderBoard'])->name('admin.leader-board');

            Route::get('user/manage', [AdminUserController::class, 'manageUser'])->name('admin.manage-user')->middleware(['web_user_permission:manage_user']);
            Route::get('user/manage/{id}', [AdminUserController::class, 'editUser'])->name('admin.manage-user.edit')->middleware(['web_user_permission:manage_user']);

            // FAQ
            Route::get('faq', [FaqController::class, 'index'])->name('admin.faq');

            // Account Details
            Route::get('user/account-details', [AdminUserController::class, 'accountDetail'])->name('admin.account-details')->middleware(['web_user_permission:account-detail']);

            // Custom Fields
            Route::get('custom-fields', [CustomFieldsController::class, 'index'])->name('admin.custom-fields')->middleware(['web_user_permission:custom_field']);
            Route::post('custom-fields', [CustomFieldsController::class, 'addCustomField'])->name('admin.add-custom-fields')->middleware(['web_user_permission:custom_field']);
            Route::post('custom-fields/delete', [CustomFieldsController::class, 'deleteCustomField'])->name('admin.delete-custom-fields')->middleware(['web_user_permission:custom_field']);

            // Import History
            Route::get('history-data', [ImportHistoryController::class, 'history'])->name('admin.history-data')->middleware(['web_user_permission:import_pin']);
            Route::get('import-history', [ImportHistoryController::class, 'index'])->name('admin.import-history')->middleware(['web_user_permission:import_pin']);
 Route::post('get-import-data', [ImportHistoryController::class, 'getImportData'])
    ->name('admin.get-import-data')->middleware(['web_user_permission:import_pin']);

Route::post('get-import-step3', [ImportHistoryController::class, 'getImportStep3'])
    ->name('admin.get-import-step3')->middleware(['web_user_permission:import_pin']);

Route::post('get-import-step4', [ImportHistoryController::class, 'getImportStep4'])
    ->name('admin.get-import-step4')->middleware(['web_user_permission:import_pin']);

            // User Track
            Route::get('user-track/dates', [UserTrackController::class, 'getTrackingDates']);
            Route::get('user-track', [UserTrackController::class, 'index'])->name('admin.user-track')->middleware(['web_user_permission:user-track']);
            Route::get('user-track/data', [UserTrackController::class, 'getUserTrackingData'])->name('admin.user-track-data')->middleware(['web_user_permission:user-track']);

            // Company
            Route::get('company', [AdminUserController::class, 'companyListing'])->name('admin.user.company');
            Route::post('company/store', [AdminUserController::class, 'companyStore'])->name('admin.store-company');

            Route::get('team-lead', [AdminUserController::class, 'teamLeadListing'])->name('admin.user.team-lead');
            Route::get('sale-reps', [AdminUserController::class, 'saleRepsListing'])->name('admin.user.sale-reps');
            Route::post('update-user', [AdminUserController::class, 'updateAllUser'])->name('admin.update-all-user');

            // Subscription
            Route::get('subscription', [SubscriptionController::class, 'index'])->name('admin.subscription.index');
            Route::post('subscription/update', [SubscriptionController::class, 'update'])->name('admin.subscription.update');

            // Package & Transactions
            Route::get('package', [PackageController::class, 'index'])->name('admin.package.index');
            Route::get('transactions', [TransactionsController::class, 'index'])->name('admin.transactions.index');

            // Logout
            Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        });
    });
});
