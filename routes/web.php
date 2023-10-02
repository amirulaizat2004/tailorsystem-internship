<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboardtailor', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboardtailor');

Route::get('fullcalendar', [DashboardController::class, 'fullcalendar'])->middleware(['auth'])->name('fullcalendar');

Route::resource('customer', CustomerController::class)->middleware(['auth']);
Route::get('createcust', [CustomerController::class, 'create'])->middleware(['auth'])->name('createcust');
Route::get('indexcust', [CustomerController::class, 'index'])->middleware(['auth'])->name('indexcust');

Route::resource('design', DesignController::class)->middleware(['auth']);
Route::get('designcreate/{id}', [DesignController::class, 'create'])->middleware(['auth'])->name('designcreate');
Route::get('designadd/{id}', [DesignController::class, 'add'])->middleware(['auth'])->name('designadd');

Route::resource('measure', MeasureController::class)->middleware(['auth']);
Route::get('measurecreate/{id}', [MeasureController::class, 'create'])->middleware(['auth'])->name('measurecreate');
Route::post('measure-store', [MeasureController::class, 'store'])->middleware(['auth'])->name('measurestore');

Route::resource('order', OrderController::class)->middleware(['auth']);
Route::get('ordercreate/{id}', [OrderController::class, 'create'])->middleware(['auth'])->name('ordercreate');
Route::get('ordershow/{id}', [OrderController::class, 'show'])->middleware(['auth'])->name('ordershow');
Route::get('orderstatus/{id}', [OrderController::class, 'status'])->middleware(['auth'])->name('orderstatus');
Route::put('updatestatus/{id}', [OrderController::class, 'updatestatus'])->middleware(['auth'])->name('updatestatus');

Route::get('add', [CustomerController::class, 'add'])->name('add');

require __DIR__.'/auth.php';
