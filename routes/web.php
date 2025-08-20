<?php

use App\Http\Controllers\DashboardController;
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
use App\Http\Controllers\VehicleController;

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
| Dashboard (Protected). 
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('dash')->name('dash.')->group(function () {

    // Static views
    Route::get('/index', [DashboardController::class, 'totalCustomers'])->name('index');

    Route::view('/notification', 'dash.Notification')->name('Notification');
    Route::view('/report', 'dash.Report')->name('Report');
    Route::view('/setting', 'dash.Setting')->name('Setting');
    Route::view('/user', 'dash.User')->name('User');

    Route::view('/Messages', 'dash.Messages')->name('Messages');



    /*
    |--------------------------------------------------------------------------
    | Bulk SMS
    |--------------------------------------------------------------------------
    */

    Route::post('/Messages/bulk', [SMSController::class, 'sendSMS'])->name('Messages.bullk');
    Route::delete('/Messages/{id}', [SMSController::class, 'destroybulk'])->name('Message.delete');
    Route::get('/Messages', [SMSController::class, 'index'])->name('Messages.index');
    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    Route::post('/Services', [ServiceController::class,  'addService'])->name('Services.add');
    Route::get('/Services', [ServiceController::class, 'showService'])->name('Services');
    Route::post('/services/status/{id}', [ServiceController::class, 'updateStatus'])->name('services.updateStatus');
    Route::put('/services/{id}', [ServiceController::class, 'updateServices'])->name('Services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroyService'])->name('Services.delete');


    /*
    |--------------------------------------------------------------------------
    | Transaction.  
    |--------------------------------------------------------------------------
    */
    Route::get('/transaction', [TransactionController::class,  'showCustomer'])->name('Transaction');
    
    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */
    Route::get('/customers', [AddCustomerController::class, 'showCustomer'])->name('Customers'); // list & stats
    Route::post('/customers', [AddCustomerController::class, 'addCustomer'])->name('Customers.add'); // add new
    Route::put('/customers/{id}', [AddCustomerController::class, 'updateCustomer'])->name('customers.update');
    Route::delete('/customers/{id}', [AddCustomerController::class, 'destroyCustomer'])->name('customers.delete');



    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    Route::get('/user', [UsersController::class, 'showUser'])->name('User'); // list & stats
    Route::post('/user', [UsersController::class, 'addUser'])->name('User');// add new
    Route::put('/user/{id}', [UsersController::class, 'updateUser'])->name('user.update');
    Route::delete('/user/{id}', [UsersController::class, 'destroyUser'])->name('user.delete');
    Route::post('/user/status/{id}', [UsersController::class, 'updateStatus'])->name('Users.updateStatus');




    /*
    |--------------------------------------------------------------------------
    | Tarriff
    |--------------------------------------------------------------------------
    */
    Route::get('/tarriff', [tarriffController::class, 'showtarriff'])->name('tarriff.index');
    Route::post('/tarriff/store', [tarriffController::class, 'store'])->name('tarriff.store');
    Route::put('/tarriff/{id}', [tarriffController::class, 'updatetarriff'])->name('tarriff.update');
    Route::delete('/tarriff/{id}', [tarriffController::class, 'destroytarriff'])->name('tarriff.delete');


    /*
    |--------------------------------------------------------------------------
    | Tracker
    |--------------------------------------------------------------------------
    */
    Route::get('/trackers', [VehicleController::class, 'index'])->name('trackers'); // list page
    Route::get('/trackers/sync', [VehicleController::class, 'getCars'])->name('trackers.sync'); 
    Route::post('/trackers/store', [VehicleController::class, 'store'])->name('tracker.store');






});
