<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\Shoppingcart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\Admin\Login;

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

//init dashboard
Route::get('/', function () {
    return view('welcome');
});

//show all product
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';

//shoppingcart
Route::get('/shoppingcart', Shoppingcart::class)->name('shoppingcart');

//admin
Route::get('/admin/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');


Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.adminlogin');
//Admin
// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
//     Route::namespace('Auth')->group(function () {
//         //login 
// Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
// });

// Route::middleware('is_admin')->group(function () {
//     //show admin page
//     Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
// });
// //logout
// Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });
