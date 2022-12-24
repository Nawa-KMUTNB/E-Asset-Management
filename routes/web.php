<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailCRUDController;
use App\Http\Controllers\CRController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MoneyController;

Route::resource('companies', CRUDController::class);
//Route::resource('companies', CRController::class);
Route::resource('detail_companies', DetailCRUDController::class);
Route::resource('money', MoneyController::class);
Route::resource('member', MemberController::class);
Route::resource('user', ManageUserController::class);

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
    return view('auth/login');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');