<?php

use App\Http\Controllers\CoustomerController;
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
    // Route::get('supplier/{id}/delete', [SupplierController::class, 'delete'])->name('supplier.delete');- for <a> tag
    Route::get('supplier/{id}/show', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('supplier/{id}/change-staus', [SupplierController::class, 'changeStatus'])->name('supplier.change-status');
    Route::get('/supplier/generatepdf',[SupplierController::class,'generatePDF'])->name('supplier.generatePDF');

    //Coustomer Part Route
    Route::get('/coustomer',[CoustomerController::class,'index'])->name('coustomer.index');
    Route::get('/coustomer/create',[CoustomerController::class,'create'])->name('coustomer.create');
    Route::post('/coustomer/store',[CoustomerController::class,'store'])->name('coustomer.store');
    Route::get('/coustomer/{id}/edit', [CoustomerController::class, 'edit'])->name('coustomer.edit');
    Route::patch('/coustomer/{id}/update', [CoustomerController::class, 'update'])->name('coustomer.update');
    Route::delete('coustomer/{id}/delete', [CoustomerController::class, 'delete'])->name('coustomer.delete');
    // Route::get('supplier/{id}/delete', [SupplierController::class, 'delete'])->name('supplier.delete');- for <a> tag
    Route::get('coustomer/{id}/show', [CoustomerController::class, 'show'])->name('coustomer.show');
    Route::get('coustomer/{id}/change-staus', [CoustomerController::class, 'changeStatus'])->name('coustomer.change-status');
    Route::get('/coustomer/generatepdf',[CoustomerController::class,'generatePDF'])->name('coustomer.generatePDF');

});

require __DIR__.'/auth.php';
