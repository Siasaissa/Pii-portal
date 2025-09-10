<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\tarriffController;
use App\Http\Controllers\Authentication\UserController;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\CustomerDeviceAssignmentController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/authentication/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/authentication/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/authentication/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/authentication/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::prefix('authentication')->group(function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    // Login with throttle
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('dash')->name('dash.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER ROUTES (restricted set)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:user,admin')->group(function () {
        Route::get('/dashboard', fn () => view('dash.dashboard'))->name('dashboard');
        Route::view('/notification', 'dash.Notification')->name('Notification');
        Route::view('/report', 'dash.Report')->name('Report');

        Route::get('/customers', [AddCustomerController::class, 'showCustomer'])->name('Customers');
        Route::get('/tracker', [TripController::class, 'index'])->name('tracker');

        Route::get('/Quotation', [CustomerDeviceAssignmentController::class, 'create'])->name('Quotation');
        Route::post('/Quotation/store', [CustomerDeviceAssignmentController::class, 'store'])->name('Quotation.store');

        Route::get('/UnAssigned', [TripController::class, 'view'])->name('UnAssigned');

        Route::post('/distribute', [UploadController::class, 'distribute'])->name('distribute');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES (full access)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::get('/index', [DashboardController::class, 'totalCustomers'])->name('index');


        Route::view('/user', 'dash.User')->name('User');
        Route::view('/Messages', 'dash.Messages')->name('Messages');

        // Quotation
        //Route::get('/Quotation', [QuotationController::class, 'Quotation'])->name('Quotation');

        // Bulk SMS
        Route::post('/Messages/bulk', [SMSController::class, 'sendSMS'])->name('Messages.bullk');
        Route::delete('/Messages/{id}', [SMSController::class, 'destroybulk'])->name('Message.delete');
        Route::get('/Messages', [SMSController::class, 'index'])->name('Messages.index');

        // Services
        Route::post('/Services', [ServiceController::class,  'addService'])->name('Services.add');
        Route::get('/Services', [ServiceController::class, 'showService'])->name('Services');
        Route::post('/services/status/{id}', [ServiceController::class, 'updateStatus'])->name('services.updateStatus');
        Route::put('/services/{id}', [ServiceController::class, 'updateServices'])->name('Services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroyService'])->name('Services.delete');

        // Transactions
        Route::get('/transaction', [TransactionController::class,  'showCustomer'])->name('Transaction');
        
        // Customers
        Route::post('/customers', [AddCustomerController::class, 'addCustomer'])->name('Customers.add');
        Route::put('/customers/{id}', [AddCustomerController::class, 'updateCustomer'])->name('customers.update');
        Route::delete('/customers/{id}', [AddCustomerController::class, 'destroyCustomer'])->name('customers.delete');

        // Users
        Route::get('/user', [UsersController::class, 'showUser'])->name('User');
        Route::post('/user', [UsersController::class, 'addUser'])->name('User');
        Route::put('/user/{id}', [UsersController::class, 'updateUser'])->name('user.update');
        Route::delete('/user/{id}', [UsersController::class, 'destroyUser'])->name('user.delete');
        Route::post('/user/status/{id}', [UsersController::class, 'updateStatus'])->name('Users.updateStatus');

        // Tarriff
        Route::get('/tarriff', [tarriffController::class, 'showtarriff'])->name('tarriff.index');
        Route::post('/tarriff/store', [tarriffController::class, 'store'])->name('tarriff.store');
        Route::put('/tarriff/{id}', [tarriffController::class, 'updatetarriff'])->name('tarriff.update');
        Route::delete('/tarriff/{id}', [tarriffController::class, 'destroytarriff'])->name('tarriff.delete');

        // Tracker
        Route::post('/tracker/store', [TripController::class, 'store'])->name('tracker.store');
        Route::get('/sync-trips', [TripController::class, 'syncTrips'])->name('sync.trips');
        

        // Upload
        Route::post('/upload-excel', [UploadController::class, 'import'])->name('upload.excel');
        Route::get('/setting', [UploadController::class, 'access'])->name('Setting');

    });

});
