<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


//Class CRUD Route
Route::get('class', [App\Http\Controllers\Admin\ClassController::class,'index'])->name('class.index');

//Class CRUD
Route::get('create/class', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('create.class');
Route::post('store/class', [App\Http\Controllers\Admin\ClassController::class, 'store'])->name('store.class');
Route::get('class/delete/{id}', [App\Http\Controllers\Admin\ClassController::class,'delete'])->name('class.delete');
Route::get('class/edit/{id}', [App\Http\Controllers\Admin\ClassController::class,'edit'])->name('class.edit');
Route::post('class/update/{id}', [App\Http\Controllers\Admin\ClassController::class,'update'])->name('class.update');
















Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/deposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite.money')->middleware('verified');

Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('user.details');

Route::post('/store/user', [App\Http\Controllers\HomeController::class, 'store'])->name('store.user');

Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change')->middleware('verified');

Route::post('/update/password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware('verified');