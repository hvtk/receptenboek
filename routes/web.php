<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MainController;

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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('auth.custom.signin');

Route::get('/register', [AuthController::class, 'signup'])->name('auth.register');
Route::post('/creater-user', [AuthController::class, 'customSignup'])->name('auth.user.registration');

Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('auth.dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('accounts', AccountController::class);


Route::post('/authenticate/save',[MainController::class, 'save'])->name('authenticate.save');
Route::post('/authenticate/check',[MainController::class, 'check'])->name('authenticate.check');
Route::get('/authenticate/logout',[MainController::class, 'logout'])->name('authenticate.logout');



Route::group(['middleware'=>['AuthenticateCheck']], function() {
    
    Route::get('/authenticate/login',[MainController::class, 'login'])->name('authenticate.login');
    Route::get('/authenticate/register',[MainController::class, 'register'])->name('authenticate.register');

    Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    Route::get('/admin/settings',[MainController::class, 'settings']);
    Route::get('/admin/profile',[MainController::class, 'profile']);
    Route::get('/admin/staff',[MainController::class, 'staff']);
});