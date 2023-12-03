<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

        /*****************User Routes*********** */      
                    //Page Routes
Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout']);

                    //User-Functions Routes

Route::post('/register-user', [UserController::class, 'registerUser']);
Route::post('/login-user', [UserController::class, 'loginUser']);


        /*****************Page Routes*********** */      

Route::get("/home",[PostController::class, 'index'])->middleware('auth');
Route::get("/post/{id}",[PostController::class, 'post'])->name("singlepost")->middleware('auth');
Route::get("/create",[PostController::class, 'create'])->middleware('auth');
Route::post("/store",[PostController::class, 'store'])->name('store')->middleware('auth');
Route::get("/myposts",[PostController::class, 'myPosts'])->middleware('auth');
Route::get("/edit/{id}",[PostController::class, 'edit'])->middleware('auth');
Route::post("/edit/{id}",[PostController::class, 'editpost'])->middleware('auth');
Route::post("/delete/{id}",[PostController::class, 'destroy'])->middleware('auth');
  
        /*****************Comments Routes*********** */    


Route::post('/post/{id}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::delete('/post/{id}/comment/{cid}', [CommentController::class, 'delete'])->middleware('auth');
Route::get('/post/{id}/comment', [CommentController::class, 'edit'])->middleware('auth');
Route::put('/post/{id}/comment/{cid}', [CommentController::class, 'update'])->middleware('auth');