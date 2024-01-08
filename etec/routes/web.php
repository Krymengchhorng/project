<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register',[UserController::class,'UserRegister']);
Route::post('/register-submit',[UserController::class,'UserRegisterSubmit']);
Route::get('/login',[UserController::class,'UserLogin'])->name('login');
Route::post('/login-submit',[UserController::class,'UserLoginSubmit']);

Route::middleware(['auth'])->group(function(){



Route::get('/post', [PostController::class,'post']);
Route::get('/post-detail/{id}',[PostController::class,'postDetail']);
Route::get('/add-post',[PostController::class, 'addPost']);
Route::post('/add-post-submit',[PostController::class, 'addPostSubmit']);
Route::get('/update-post/{id}',[PostController::class,'updatePost']);
Route::post('/update-post-submit',[PostController::class, 'updatePostSubmit']);
Route::get('/remove-post/{id}',[PostController::class,'removePost']);
Route::post('/remove-post-submit',[PostController::class, 'removePostSubmit']);
Route::get('/home',[PostController::class,'homePage']);
Route::get('/about',[PostController::class,'aboutPage']);
});