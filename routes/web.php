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

//Route::resource('accounts', AccountController::class);

Route::post('/accounts/store',[AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/create',[AccountController::class, 'create'])->name('accounts.create');
Route::get('/accounts/show', [AccountController::class, 'show'])->name('accounts.show');
Route::get('/accounts/index', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::post('/accounts/update', [AccountController::class, 'update'])->name('accounts.update');


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