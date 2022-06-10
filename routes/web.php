<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\DocumentsTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLocationMappingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebContentController;
use App\Http\Controllers\AddonController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/{dashboardUrl}', [DashboardController::class, 'index'])
    ->where(['dashboardUrl' => 'home|dashboard|administrator|admin'])
    ->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('publicHome');

Route::get('/contact', [ContactUsController::class, 'contactUs'])->name('contactUs');
Route::post('/contact/save', [ContactUsController::class, 'contactStore'])->name('contactStore');

//start for template all page , it should be remove for production
Route::get('demo-pages/{name}', [PageController::class, 'pages'])->name('template');

Route::get('pages/{slug}', [PageController::class, 'contentGateway'])->name('contentGateway');

Route::post('get-documents', [DocumentsController::class, 'getDocumentsByType'])->name('getDocumentsByType');

Route::get('signup', [SignUpController::class, 'index'])
    ->name('signup');
Route::post('signup-store', [SignUpController::class, 'storeSignup'])
    ->name('storeSignup');
Route::get('storage-link-create', [HomeController::class, 'storageLinkCreate'])
    ->name('pages.storageLinkCreate');

Route::group([
    'middleware' => [
        'auth',
    ],
], function () {
    Route::get('systems-role-update', [RoleController::class, 'systemsRoleUpdate'])
        ->middleware('only.administrator')
        ->name('systems.role.update');

///is auth or auth access
    Route::get('signupusers', [DashboardController::class, 'signupusers'])
        ->name('signupusers.index');
    Route::get('new-signedupusers', [DashboardController::class, 'newSignedUpUsers'])
        ->name('new_signupusers.index');
    Route::get('subscribers', [DashboardController::class, 'subscribers'])
        ->name('subscribers.index');
    Route::get('new-subscribers', [DashboardController::class, 'newSubscribers'])
        ->name('new_subscribers.index');
    // Route::get('free-trial-subscribers', [DashboardController::class, 'trialSubscribers'])
    //     ->name('free_trial_subscribers.index');
    // Route::get('new-free-trial-subscribers', [DashboardController::class, 'newTrialSubscribers'])
    //     ->name('new_free_trial_subscribers.index');
    // Route::get('free-trial-honey-bee-subscribers', [DashboardController::class, 'trialHoneyBeeSubscribers'])
    //     ->name('free_trial_honey_bee_subscribers.index');
    // Route::get('free-trial-bumble-bee-subscribers', [DashboardController::class, 'trialBumbleBeeSubscribers'])
    //     ->name('free_trial_bumble_bee_subscribers.index');
    // Route::get('free-trial-queen-bee-subscribers', [DashboardController::class, 'trialQueenBeeSubscribers'])
    //     ->name('free_trial_queen_bee_subscribers.index');
    Route::get('paid-subscribers', [DashboardController::class, 'paidSubscribers'])
        ->name('paid_subscribers.index');
    Route::get('new-paid-subscribers', [DashboardController::class, 'newPaidSubscribers'])
        ->name('new_paid_subscribers.index');
    Route::get('current-paid-subscribers', [DashboardController::class, 'currentPaidSubscribers'])
        ->name('current_paid_subscribers.index');
    Route::get('paid-honey-bee-subscribers', [DashboardController::class, 'paidHoneyBeeSubscribers'])
        ->name('paid_honey_bee_subscribers.index');
    Route::get('paid-bumble-bee-subscribers', [DashboardController::class, 'paidBumbleBeeSubscribers'])
        ->name('paid_bumble_bee_subscribers.index');
    Route::get('paid-queen-bee-subscribers', [DashboardController::class, 'paidQueenBeeSubscribers'])
        ->name('paid_queen_bee_subscribers.index');
    // Route::get('expired-subscribers', [DashboardController::class, 'expiredSubscribers'])
    //     ->name('expired_subscribers.index');
    Route::resource('package', PackageController::class)->except(['show']);
    Route::resource('promotion', PromotionController::class)->except(['show']);
    Route::resource('payments', PaymentController::class)->except(['show']);
    Route::resource('addons', AddonController::class);
});

Auth::routes();
Route::group([
    'middleware' => [
        'auth.access', 'auth',
    ],
], function () {

    Route::resource('site_settings', SiteSettingsController::class)
        ->only(['edit', 'update']);

    Route::resource('users', UserController::class)
        ->except(['create', 'store']);
    Route::get('user_profile', [UserController::class, 'setProfile'])->name('setProfile');
    Route::get('password-reset/{id}', [UserController::class, 'PasswordReset'])->name('PasswordReset');
    Route::post('password-reset/{id}', [UserController::class, 'saveResetPassword'])->name('saveResetPassword');

    Route::resource('menu', MenuController::class);
    Route::resource('web_content', WebContentController::class);
    Route::resource('document_type', DocumentsTypeController::class);
    Route::get('document_type_sort/{type_id?}', [DocumentsTypeController::class, 'getDocumentType'])->name('getDocumentType');
    Route::resource('documents', DocumentsController::class);
    Route::get('get-document_mime/{type_id}', [DocumentsController::class, 'getMimeType']);
    Route::resource('roles', RoleController::class)
        ->except(['show']);
    Route::resource('menu_map', MenuLocationMappingController::class)->only(['index', 'store']);
    Route::get('menu_mapping/{location_id?}', [MenuLocationMappingController::class, 'menuMapping'])->name('menuMapping');
    Route::get('remove_assign_data/{data}', [MenuLocationMappingController::class, 'removeAssignData'])->name('removeAssignData');
    Route::get('add_menu_map/{location_id}/{menu_ids}', [MenuLocationMappingController::class, 'addMenuMap'])->name('addMenuMap');
    Route::get('location_map', [MenuLocationMappingController::class, 'getLocationMap'])->name('locationMap');
    Route::post('ajax/column-value/sorting', [AjaxController::class, 'columnSorting'])->name('ajax.column_value.sorting');
    Route::get('/contact-status', [ContactUsController::class, 'contactStatus'])->name('contactStatus');
    Route::post('/content-attach', [WebContentController::class, 'contentFileAttach'])->name('contentFileAttach');
});
