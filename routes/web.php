<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //supplier_web_route
    Route::get('/supplier',[SupplierController::class,'index'])->name('supplier.index');
    Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
    Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::patch('/supplier/{id}/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('supplier/{id}/delete', [SupplierController::class, 'delete'])->name('supplier.delete');


});

require __DIR__.'/auth.php';
