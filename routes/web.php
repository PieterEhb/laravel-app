<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;

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

/*Index Route*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*user Routes*/

Route::get('/user/profile/{id}',[UserController::class, 'profile'])->name('user.profile');
Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update',[UserController::class, 'update'])->name('user.update');
Route::get('/user/changepassword/{id}',[UserController::class, 'changePassword'])->name('user.changePassword');
Route::post('/user/changepassword/{id}',[UserController::class, 'changePasswordSave'])->name('user.postChangePassword');

/*News routes*/
Route::resource('news',NewsController::class);

/*Comments routes*/
Route::resource('comment',CommentController::class);

/*Auth Routes*/
Auth::routes();


