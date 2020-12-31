<?php

use App\Http\Controllers\HomeController;
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
/*

Route::redirect('/anasayfa', '/home')->name('anasayfa');
*/
//controllere ihtiyac yoksa
Route::get('/', function () {
    return view('home.index');
});

Route::get('/services', function () {
    return view('layouts.services');
});
/*
Route::get('/about', function () {
    return view('layouts.about');
});*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'abouts'])->name('about');
/*//Route::get('/test/{id}', [HomeController::class, 'test'])->where('id', '[0-9]+');
//string icin
//Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->whereNumber('id')->whereAlpha('name')->name('test');
*/

//Admin
Route::get('/admin',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home')->middleware('index');

Route::get('/admin/login',[HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeController::class, 'logout'])->name('admin_logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
