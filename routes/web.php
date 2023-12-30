<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\QuestioncategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportsController;

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
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/adminIndex', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('adminIndex');

/*user Routes*/
Route::get('/user/profile/{id}',[UserController::class, 'profile'])->name('user.profile');
Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update',[UserController::class, 'update'])->name('user.update');
Route::get('/user/changepassword/{id}',[UserController::class, 'changePassword'])->name('user.changePassword');
Route::post('/user/changepassword/{id}',[UserController::class, 'changePasswordSave'])->name('user.postChangePassword');
Route::get('/users',[UserController::class, 'index'])->name('user.index');
Route::delete('/user/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{id}/updateRole',[UserController::class, 'updateRole'])->name('user.updateRole');

/*News routes*/
Route::get('/news/admin',[NewsController::class,'adminIndex'])->name('news.adminNews');
Route::get('/news/{newsId}/admin',[NewsController::class,'adminShow'])->name('news.adminShow');
Route::resource('news',NewsController::class);
Route::get('/news/{newsId}/addComment',[CommentController::class,'comment'])->name('comment');
Route::post('/news/{newsId}/addComment',[CommentController::class,'add'])->name('addComment');
Route::get('like/{newsId}', [LikeController::class, 'like'])->name('like');


/*Comments routes*/
Route::get('/comment/{id}',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/comment/update/{id}',[CommentController::class,'update'])->name('comment.update');
Route::post('/comment/delete/{id}',[CommentController::class,'delete'])->name('comment.delete');
Route::get('/comment/{id}/report',[ReportsController::class,'reportComment'])->name('comment.report');

/*contactForm routes*/
Route::resource('/contactform', ContactformController::class);

/*FAQ routes*/
Route::get('/faq/admin',[QuestionController::class,'adminIndex'])->name('faq.adminFAQ');
Route::resource('/faq', QuestionController::class);


/*FAQcategories routes*/
Route::resource('/faqcategories', QuestioncategoryController::class);

/*Auth Routes*/
Auth::routes();


