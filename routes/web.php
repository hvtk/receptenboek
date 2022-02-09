<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
//use App\Http\Controllers\UserTestController;
//use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalDataController;


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

//routes for personalData
Route::post('/personalData',[PersonalDataController::class, 'store'])->name('personalData.store');
Route::put('/personalData/{personalData}', [PersonalDataController::class, 'update'])->name('personalData.update');
Route::delete('/personalData/{personalData}',[PersonalDataController::class, 'destroy'])->name('personalData.destroy');

Route::get('/personalData', [PersonalDataController::class, 'index'])->name('personalData.index');
Route::get('/personalData/create',[PersonalDataController::class, 'create'])->name('personalData.create');
Route::get('/personalData/{personalData}', [PersonalDataController::class, 'show'])->name('personalData.show');
Route::get('/personalData/{personalData}/edit', [PersonalDataController::class, 'edit'])->name('personalData.edit');

//Routes for authenticate and admin
//Route::post('/authenticate/save',[MainController::class, 'save'])->name('authenticate.save');
//Route::post('/authenticate/check',[MainController::class, 'check'])->name('authenticate.check');
//Route::get('/authenticate/logout',[MainController::class, 'logout'])->name('authenticate.logout');

//Routes for authenticate and admin with user_table
Route::post('/authenticate/save',[UserController::class, 'save'])->name('authenticate.save');
Route::post('/authenticate/check',[UserController::class, 'check'])->name('authenticate.check');
Route::get('/authenticate/logout',[UserController::class, 'logout'])->name('authenticate.logout');

Route::group(['middleware'=>['AuthenticateCheck']], function() {
    
    //Routes for authenticate and admin
    //Route::get('/authenticate/login',[MainController::class, 'login'])->name('authenticate.login');
    //Route::get('/authenticate/register',[MainController::class, 'register'])->name('authenticate.register');

    //Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    //Route::get('/admin/settings',[MainController::class, 'settings']);
    //Route::get('/admin/profile',[MainController::class, 'profile']);
    //Route::get('/admin/staff',[MainController::class, 'staff']);

    //Routes for authenticate and admin with user_table
    Route::get('/authenticate/login',[UserController::class, 'login'])->name('authenticate.login');
    Route::get('/authenticate/register',[UserController::class, 'register'])->name('authenticate.register');

    Route::get('/admin/dashboard',[userController::class, 'dashboard']);
    Route::get('/admin/settings',[UserController::class, 'settings']);
    Route::get('/admin/profile',[UserController::class, 'profile']);
    Route::get('/admin/staff',[UserController::class, 'staff']);
});