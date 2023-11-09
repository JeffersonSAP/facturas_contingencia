<?php
use App\Http\Controllers\FacturasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');
});
Route::view('/login', [FacturasController::class, 'index'])->name('facturas.login');
Route::get('/', [FacturasController::class, 'index'])->name('facturas.index');
Route::get('/welcome', [FacturasController::class, 'welcome'])->name('facturas.welcome');
Route::get('/asigna', [FacturasController::class, 'asigna'])->name('facturas.asigna');
Route::get('/create', [FacturasController::class, 'create'])->name('facturas.create');
Route::get('/logout', [FacturasController::class, 'logout'])->name('facturas.logout');
Route::get('/edit/{id}', [FacturasController::class, 'edit'])->name('facturas.edit');
Route::put('/update/{id}', [FacturasController::class, 'update'])->name('facturas.update');
Route::GET('/eliminaDet/{id}', [FacturasController::class, 'eliminaDet'])->name('facturas.eliminaDet');
//Route::delete('/eliminaDet/{id}', [FacturasController::class, 'eliminaDet'])->name('facturas.eliminaDet');
Route::get('/show/{id}', [FacturasController::class, 'show'])->name('facturas.show');
Route::post('/store', [FacturasController::class, 'store'])->name('facturas.store');
Route::put('/update_prod/{id}', [FacturasController::class, 'update_prod'])->name('facturas.update_prod');