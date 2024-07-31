<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Middleware\Test;
use App\Http\Middleware\Test1;
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


	Route::controller(CategoryController::class)->group(function(){
		Route::get('admin/category' , 'index')->name('category.index');
		Route::get('admin/category/create' , 'create')->name('category.create')->middleware('can:create,App\Models\Category');
		Route::get('admin/category/{id}/edit' , 'edit')->name('category.edit');
		Route::put('admin/category/update/{id}' , 'update')->name('category.update');
		Route::post('admin/category/store' , 'store')->name('category.store');
		Route::get('admin/category/{id}/status' , 'status')->name('category.status');
		Route::get('admin/category/delete/{id}' , 'delete')->name('category.delete')->middleware('can:delete,App\Models\Category');
	});

	Route::controller(MediaController::class)->group(function(){
		Route::get('admin/media' , 'index')->name('media.index');
		Route::get('admin/media/create' , 'create')->name('media.create');
		Route::post('admin/media/store' , 'store')->name('media.store');
		Route::get('admin/media/{id}/edit' , 'edit')->name('media.edit');
		Route::put('admin/media/update/{id}' , 'update')->name('media.update');
		Route::get('admin/media/{id}/status' , 'status')->name('media.status');
		Route::get('admin/media/delete/{id}' , 'delete')->name('media.delete');
	});
	Route::controller(MessageController::class)->group(function(){
		Route::get('admin/message' , 'index')->name('message.index');
		Route::get('admin/message/create' , 'create')->name('message.create');
		Route::post('admin/message/store' , 'store')->name('message.store');
		Route::get('admin/message/{id}/edit' , 'edit')->name('message.edit');
		Route::put('admin/message/update/{id}' , 'update')->name('message.update');
		Route::get('admin/message/{id}/status' , 'status')->name('message.status');
		Route::get('admin/message/delete/{id}' , 'delete')->name('message.delete');
	});

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/dashboard', function () {
	    return view('dashboard');
	})->middleware(['auth', 'verified'])->name('dashboard');

	Route::middleware('auth')->group(function () {

		Route::get('/admin/custom_auth/changePassword' , [HomeController::class , 'changepassword'])->name('changepassword');
		Route::post('/admin/update_password', [HomeController::class , 'update_password'])->name('update_password');
	   	//Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	});

	require __DIR__.'/auth.php';
