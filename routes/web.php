<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');


Route::get('/page-not-found', function () {
    return view('errors.404');
})->name('not-found');

Route::get('/blog/{slug}', [UserBlogController::class, 'singleBlog'])->name('blog.single');


Route::group(['middleware' => 'guest'], function (){
    Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');
   
    
    
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'user']], function() {
    Route::get('/like/{id}', [LikeController::class, 'like'])->name('like');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.create');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/categories',  [CategoryController::class, 'index'])->name('categories');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    
    Route::resource('role', RoleController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/blog/{blog}', [BlogController::class, 'blogComments'])->name('blog.comments');
    
    Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});