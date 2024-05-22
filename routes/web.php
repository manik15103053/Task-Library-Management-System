<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use \App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use \App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ForgetPasswordController;

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
Route::get('/all-blogs',[FrontendController::class,'blog'])->name('frontend.blog');
Route::get('/posts-by-category/{slug?}',[FrontendController::class,'postByCat'])->name('frontend.postByCat');


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
    Route::get('/dashboard',[UserDashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/users',[UserDashboardController::class,'allUser'])->name('allUser');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

    //Category
    Route::prefix('categories')->name('category.')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{slug}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{slug}',[CategoryController::class,'update'])->name('update');
        Route::get('/delete/{slug}',[CategoryController::class,'delete'])->name('delete');
    });

    //Blog
    Route::prefix('blogs')->name('blog.')->group(function (){
        Route::get('/',[BlogController::class,'index'])->name('index');
        Route::get('/create',[BlogController::class,'create'])->name('create');
        Route::post('/store',[BlogController::class,'store'])->name('store');
        Route::get('/edit/{slug}',[BlogController::class,'edit'])->name('edit');
        Route::post('/update/{slug}',[BlogController::class,'update'])->name('update');
        Route::get('/delete/{slug}',[BlogController::class,'delete'])->name('delete');
    });

    //Author
    Route::prefix('authors')->name('author.')->group(function (){
        Route::get('/',[AuthorController::class,'index'])->name('index');
        Route::get('/create',[AuthorController::class,'create'])->name('create');
        Route::post('/store',[AuthorController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[AuthorController::class,'update'])->name('update');
        Route::get('/delete/{id}',[AuthorController::class,'delete'])->name('delete');
    });
    //Book
    Route::prefix('books')->name('book.')->group(function (){
        Route::get('/',[BookController::class,'index'])->name('index');
        Route::get('/create',[BookController::class,'create'])->name('create');
        Route::post('/store',[BookController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BookController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[BookController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BookController::class,'delete'])->name('delete');
    });
    //Member
    Route::prefix('members')->name('member.')->group(function (){
        Route::get('/',[MemberController::class,'index'])->name('index');
        Route::get('/create',[MemberController::class,'create'])->name('create');
        Route::post('/store',[MemberController::class,'store'])->name('store');
        Route::get('/edit/{id}',[MemberController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[MemberController::class,'update'])->name('update');
        Route::get('/delete/{id}',[MemberController::class,'delete'])->name('delete');
    });
});

