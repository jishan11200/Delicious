<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\admin\CategoryController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' =>'admin','middleware'=> 'auth'],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('slider',SlideController::class);
    Route::resource('category',CategoryController::class);
});

Auth::routes();


