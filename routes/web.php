<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use \App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use \App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[FrontendController::class,'index'])->name('frontend.index');

//Registration
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register-submit',[AuthController::class,'regisSub'])->name('register.submit');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/check',[AuthController::class,'check'])->name('check.login');
Route::get('/forget-password',[ForgetPasswordController::class,'forgetPass'])->name('forget.password');
Route::post('/forget-password-send-reset-link',[ForgetPasswordController::class,'sendResetLink'])->name('forgot.password.sendLink');
Route::get('/password/reset/{token}',[ForgetPasswordController::class,'showResetForm'])->name('reset.password.token');
Route::post('/password-reset-submit',[ForgetPasswordController::class,'resetPassword'])->name('reset-password.submit');



Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard',[UserDashboardController::class,'dashboard'])->name('dashboard')->middleware('can:dashboard');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

    //User
    Route::prefix('users')->name('user.')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('index')->middleware('can:user.index');
        Route::get('/create',[UserController::class,'create'])->name('create')->middleware('can:user.create');
        Route::post('/store',[UserController::class,'store'])->name('store')->middleware('can:user.create');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit')->middleware('can:user.edit');
        Route::post('/update/{id}',[UserController::class,'update'])->name('update')->middleware('can:user.edit');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete')->middleware('can:user.delete');
    });
    //Role
    Route::prefix('roles')->name('role.')->group(function (){
        Route::get('/',[RoleController::class,'index'])->name('index')->middleware('can:role.index');
        Route::get('/create',[RoleController::class,'create'])->name('create')->middleware('can:role.create');
        Route::post('/store',[RoleController::class,'store'])->name('store')->middleware('can:role.create');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit')->middleware('can:role.edit');
        Route::post('/update/{id}',[RoleController::class,'update'])->name('update')->middleware('can:role.edit');
        Route::get('/delete/{id}',[RoleController::class,'delete'])->name('delete')->middleware('can:role.delete');
    });

    //Author
    Route::prefix('authors')->name('author.')->group(function (){
        Route::get('/',[AuthorController::class,'index'])->name('index')->middleware('can:author.index');
        Route::get('/create',[AuthorController::class,'create'])->name('create')->middleware('can:author.create');
        Route::post('/store',[AuthorController::class,'store'])->name('store')->middleware('can:author.create');
        Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('edit')->middleware('can:author.edit');
        Route::post('/update/{id}',[AuthorController::class,'update'])->name('update')->middleware('can:author.edit');
        Route::get('/delete/{id}',[AuthorController::class,'delete'])->name('delete')->middleware('can:author.delete');
    });
    //Book
    Route::prefix('books')->name('book.')->group(function (){
        Route::get('/',[BookController::class,'index'])->name('index')->middleware('can:book.index');
        Route::get('/create',[BookController::class,'create'])->name('create')->middleware('can:book.create');
        Route::post('/store',[BookController::class,'store'])->name('store')->middleware('can:book.create');
        Route::get('/edit/{id}',[BookController::class,'edit'])->name('edit')->middleware('can:book.edit');
        Route::post('/update/{id}',[BookController::class,'update'])->name('update')->middleware('can:book.edit');
        Route::get('/delete/{id}',[BookController::class,'delete'])->name('delete')->middleware('can:book.delete');
    });
    //Member
    Route::prefix('members')->name('member.')->group(function (){
        Route::get('/',[MemberController::class,'index'])->name('index')->middleware('can:member.index');
        Route::get('/create',[MemberController::class,'create'])->name('create')->middleware('can:member.create');
        Route::post('/store',[MemberController::class,'store'])->name('store')->middleware('can:member.create');
        Route::get('/edit/{id}',[MemberController::class,'edit'])->name('edit')->middleware('can:member.edit');
        Route::post('/update/{id}',[MemberController::class,'update'])->name('update')->middleware('can:member.edit');
        Route::get('/delete/{id}',[MemberController::class,'delete'])->name('delete')->middleware('can:member.delete');
    });

    //Borrow-book
    Route::prefix('borrow-book')->name('borrow.')->group(function (){
        Route::get('/',[BorrowController::class,'index'])->name('index')->middleware('can:borrow.index');
        Route::get('/create',[BorrowController::class,'create'])->name('create')->middleware('can:borrow.create');
        Route::post('/store',[BorrowController::class,'store'])->name('store')->middleware('can:borrow.create');
        Route::get('/edit/{id}',[BorrowController::class,'edit'])->name('edit')->middleware('can:borrow.edit');
        Route::post('/update/{id}',[BorrowController::class,'update'])->name('update')->middleware('can:borrow.edit');
        Route::get('/delete/{id}',[BorrowController::class,'delete'])->name('delete')->middleware('can:borrow.delete');
    });
});


Route::fallback(function () {
    return view('errors.404');
});
