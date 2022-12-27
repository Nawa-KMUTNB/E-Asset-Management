<?php

use App\Http\Controllers\BringController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailCRUDController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\SearchController;

Route::resource('companies', CRUDController::class);

//  Route::get('/search', [CRUDController::class, 'search']);
Route::get('/search', [SearchController::class, 'search'])->name('web.search');
Route::get('/find', [SearchController::class, 'find'])->name('web.find');

//การค้นหาหน้า Member
Route::get('/finduser', [SearchController::class, 'finduser'])->name('web.finduser');
Route::get('/searchMember', [SearchController::class, 'searchMember'])->name('web.searchMember');




Route::resource('detail_companies', DetailCRUDController::class);
Route::resource('money', MoneyController::class);
Route::resource('member', MemberController::class);
Route::resource('user', ManageUserController::class);
Route::resource('bring', BringController::class);


Route::get('member', [BringController::class, 'member'])->name('member');

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