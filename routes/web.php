<?php

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
Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Course'], function () {
    Route::get('courses', 'IndexController')->name('Course.index');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('courses/create', 'CreateController')->name('Course.create');
        Route::post('courses', 'StoreController')->name('Course.store');
        Route::get('/courses/{course}', 'ShowController')->name('Course.show');
        Route::get('/courses/{course}/edit', 'EditController')->name('Course.edit');
        Route::patch('/courses/{course}', 'UpdateController')->name('Course.update');
        Route::delete('/courses/{course}', 'DestroyController')->name('Course.destroy');
    });
    Route::group(['middleware' => 'curator'], function () {
        Route::get('/courses/{course}', 'ShowController')->name('Course.show');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Group'], function () {
    Route::get('groups', 'IndexController')->name('Group.index');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('groups/create', 'CreateController')->name('Group.create');
        Route::post('groups', 'StoreController')->name('Group.store');
        Route::get('/groups/{group}', 'ShowController')->name('Group.show');
        Route::get('/groups/{group}/edit', 'EditController')->name('Group.edit');
        Route::patch('/groups/{group}', 'UpdateController')->name('Group.update');
        Route::delete('/groups/{group}', 'DestroyController')->name('Group.destroy');
    });
    Route::group(['middleware' => 'curator'], function () {
        Route::get('/groups/{group}', 'ShowController')->name('Group.show');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Lesson'], function () {
    Route::get('lessons', 'IndexController')->name('Lesson.index');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('lessons/create', 'CreateController')->name('Lesson.create');
        Route::post('lessons', 'StoreController')->name('Lesson.store');
        Route::get('/lessons/{lesson}', 'ShowController')->name('Lesson.show');
        Route::get('/lessons/{lesson}/edit', 'EditController')->name('Lesson.edit');
        Route::patch('/lessons/{lesson}', 'UpdateController')->name('Lesson.update');
        Route::delete('/lessons/{lesson}', 'DestroyController')->name('Lesson.destroy');
    });
    Route::group(['middleware' => 'curator'], function () {
        Route::get('/lessons/{lesson}', 'ShowController')->name('Lesson.show');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('users', 'IndexController')->name('User.index');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('users/create', 'CreateController')->name('User.create');
        Route::post('users', 'StoreController')->name('User.store');
        Route::get('/users/{user}/edit', 'EditController')->name('User.edit');
        Route::patch('/users/{user}', 'UpdateController')->name('User.update');
        Route::delete('/users/{user}', 'DestroyController')->name('User.destroy');

    });
    Route::group(['middleware' => 'curator'], function () {
        Route::get('/users/{user}', 'ShowController')->name('User.show');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('Home.edit');
Route::patch('/home', [App\Http\Controllers\HomeController::class, 'update'])->name('Home.update');
Route::get('/', [App\Http\Controllers\WithOutHomeController::class, 'index'])->name('without_home');
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'index'])->name('logout');
