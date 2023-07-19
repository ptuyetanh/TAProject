<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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
route::get('/',function (){
    return view('auth/login');
});
//route::get('/',[LoginController::class,'login']);

//Admin
Route::prefix('admin')->middleware('isAdmin')->group(function (){
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/users/store',[UserController::class,'store'])->name('users.store');
    Route::get('users/{id}/edit',[UserController::class,'edit']);
    Route::put('users/{id}/update',[UserController::class,'update']);
    Route::get('users/{id}/show',[UserController::class,'show']);
    Route::delete('users/{id}/delete',[UserController::class,'destroy']);
    Route::get('/courses', [CourseController::class,'index'])->name('courses.index');
    Route::get('/courses/create',[CourseController::class,'create'])->name('courses.create');
    Route::post('/courses/store',[CourseController::class,'store'])->name('courses.store');
    Route::get('courses/{id}/edit',[CourseController::class,'edit']);
    Route::put('courses/{id}/update',[CourseController::class,'update']);
    Route::delete('courses/{id}/delete',[CourseController::class,'destroy']);
    Route::get('courses/{id}/show',[CourseController::class,'show']);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');




