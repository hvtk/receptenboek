<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserTestController;
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

Route::get('/receptenboek', function() {
    return view('startpage');
});


//routes for one to one relationship between account and user. this is only a test for how it works!
Route::get('add-user', [UserTestController::class, 'insertRecord']);
Route::get('get-account/{id}', [UserTestController::class, 'fetchAccountByUser']);

//routes for posts(upload images)
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

//routes for accounts
Route::post('/accounts',[AccountController::class, 'store'])->name('accounts.store');
Route::put('/accounts/{account}', [AccountController::class, 'update'])->name('accounts.update');
Route::delete('/accounts/{account}',[AccountController::class, 'destroy'])->name('accounts.destroy');

Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/create',[AccountController::class, 'create'])->name('accounts.create');
Route::get('/accounts/{account}', [AccountController::class, 'show'])->name('accounts.show');
Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])->name('accounts.edit');

//Routes for authenticate and admin
Route::post('/authenticate/save',[MainController::class, 'save'])->name('authenticate.save');
Route::post('/authenticate/check',[MainController::class, 'check'])->name('authenticate.check');
Route::get('/authenticate/logout',[AuthController::class, 'logout'])->name('authenticate.logout');

Route::group(['middleware'=>['AuthenticateCheck']], function() {
    
    Route::get('/authenticate/login',[AuthController::class, 'login'])->name('authenticate.login');
    Route::get('/authenticate/register',[AuthController::class, 'register'])->name('authenticate.register');

    Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('/admin/settings',[AdminController::class, 'settings']);
    Route::get('/admin/profile',[AdminController::class, 'profile']);
    Route::get('/admin/staff',[AdminController::class, 'staff']);
});