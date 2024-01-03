<?php

use App\Http\Controllers\AreaGudangController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\pegawaiAjaxController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiGudangController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AuthController;
use App\Models\LokasiGudang;
use App\Models\Satuan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('dashboard');
})->middleware('auth');

// Route::resource('satuan', SatuanController::class);
// Route::get('satuan/{id}', SatuanController::class, 'updateStatus');
// Route::resource('kategori', KategoriController::class);
// Route::resource('lokasigudang', LokasiGudangController::class);
// Route::resource('user', UserController::class);
// Route::resource('rak', RakController::class);
// Route::resource('areagudang', AreaGudangController::class);
// Route::resource('warehouse', WarehouseController::class);

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authentication'])->middleware('guest');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


Route::get('warehouse', [WarehouseController::class, 'index'])->name('warehouse.index')->middleware('auth');
Route::get('warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create')->middleware('auth');
Route::post('warehouse', [WarehouseController::class, 'store'])->name('warehouse.store')->middleware('auth');
Route::get('warehouse/{id}/status', [WarehouseController::class, 'show'])->name('warehouse.show')->middleware('auth');
Route::get('warehouse/{id}/edit', [WarehouseController::class, 'edit'])->name('warehouse.edit')->middleware('auth');
Route::put('warehouse/{id}', [WarehouseController::class, 'update'])->name('warehouse.update')->middleware('auth');
Route::delete('warehouse/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy')->middleware('auth');
Route::get('warehouse/{id}/status', [WarehouseController::class, 'status'])->name('warehouse.status')->middleware('auth');

Route::get('areagudang', [AreaGudangController::class, 'index'])->name('areagudang.index')->middleware('auth');
Route::get('areagudang/create', [AreaGudangController::class, 'create'])->name('areagudang.create')->middleware('auth');
Route::post('areagudang', [AreaGudangController::class, 'store'])->name('areagudang.store')->middleware('auth');
Route::get('areagudang/{id}/status', [AreaGudangController::class, 'show'])->name('areagudang.show')->middleware('auth');
Route::get('areagudang/{id}/edit', [AreaGudangController::class, 'edit'])->name('areagudang.edit')->middleware('auth');
Route::put('areagudang/{id}', [AreaGudangController::class, 'update'])->name('areagudang.update')->middleware('auth');
Route::delete('areagudang/{id}', [AreaGudangController::class, 'destroy'])->name('areagudang.destroy')->middleware('auth');
Route::get('areagudang/{id}/status', [AreaGudangController::class, 'status'])->name('areagudang.status')->middleware('auth');

Route::get('rak', [RakController::class, 'index'])->name('rak.index')->middleware('auth');
Route::get('rak/create', [RakController::class, 'create'])->name('rak.create')->middleware('auth');
Route::post('rak', [RakController::class, 'store'])->name('rak.store')->middleware('auth');
Route::get('rak/{id}/status', [RakController::class, 'show'])->name('rak.show')->middleware('auth');
Route::get('rak/{id}/edit', [RakController::class, 'edit'])->name('rak.edit')->middleware('auth');
Route::put('rak/{id}', [RakController::class, 'update'])->name('rak.update')->middleware('auth');
Route::delete('rak/{id}', [RakController::class, 'destroy'])->name('rak.destroy')->middleware('auth');
Route::get('rak/{id}/status', [RakController::class, 'status'])->name('rak.status')->middleware('auth');

Route::get('user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('user', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('user/{id}/status', [UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('user/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::get('user/{id}/status', [UserController::class, 'status'])->name('user.status')->middleware('auth');

Route::get('lokasigudang', [LokasiGudangController::class, 'index'])->name('lokasigudang.index')->middleware('auth');
Route::get('lokasigudang/create', [LokasiGudangController::class, 'create'])->name('lokasigudang.create')->middleware('auth');
Route::post('lokasigudang', [LokasiGudangController::class, 'store'])->name('lokasigudang.store')->middleware('auth');
Route::get('lokasigudang/{id}/status', [LokasiGudangController::class, 'show'])->name('lokasigudang.show')->middleware('auth');
Route::get('lokasigudang/{id}/edit', [LokasiGudangController::class, 'edit'])->name('lokasigudang.edit')->middleware('auth');
Route::put('lokasigudang/{id}', [LokasiGudangController::class, 'update'])->name('lokasigudang.update')->middleware('auth');
Route::delete('lokasigudang/{id}', [LokasiGudangController::class, 'destroy'])->name('lokasigudang.destroy')->middleware('auth');
Route::get('lokasigudang/{id}/status', [LokasiGudangController::class, 'status'])->name('lokasigudang.status')->middleware('auth');

Route::get('satuan', [SatuanController::class, 'index'])->name('satuan.index')->middleware('auth');
Route::get('satuan/create', [SatuanController::class, 'create'])->name('satuan.create')->middleware('auth');
Route::post('satuan', [SatuanController::class, 'store'])->name('satuan.store')->middleware('auth');
Route::get('satuan/{id}/status', [SatuanController::class, 'show'])->name('satuan.show')->middleware('auth');
Route::get('satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit')->middleware('auth');
Route::put('satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update')->middleware('auth');
Route::delete('satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy')->middleware('auth');
Route::get('satuan/{id}/status', [SatuanController::class, 'status'])->name('satuan.status')->middleware('auth');

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create')->middleware('auth');
Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store')->middleware('auth');
Route::get('kategori/{id}/status', [KategoriController::class, 'show'])->name('kategori.show')->middleware('auth');
Route::get('kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('auth');
Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('auth');
Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('auth');
Route::get('kategori/{id}/status', [KategoriController::class, 'status'])->name('kategori.status')->middleware('auth');

