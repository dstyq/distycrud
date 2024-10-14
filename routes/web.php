<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\DashboardController;

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Master Data Routes
Route::prefix('master')->group(function () {
    // User Routes
    Route::get('user', [UserController::class, 'index'])->name('master.user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('master.user.create');
    Route::post('user', [UserController::class, 'store'])->name('master.user.store'); // Menyimpan pengguna baru
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('master.user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('master.user.update'); // Memperbarui pengguna
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('master.user.destroy'); // Menghapus pengguna

    // Supplier Routes
    Route::get('supplier', [SupplierController::class, 'index'])->name('master.supplier.index');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('master.supplier.create');
    Route::post('supplier', [SupplierController::class, 'store'])->name('master.supplier.store');
    Route::get('supplier/{id}/edit', [SupplierController::class, 'edit'])->name('master.supplier.edit');
    Route::put('supplier/{id}', [SupplierController::class, 'update'])->name('master.supplier.update');
    Route::delete('supplier/{id}', [SupplierController::class, 'destroy'])->name('master.supplier.destroy');

    // Material Routes
    Route::get('material', [MaterialController::class, 'index'])->name('master.material.index');
    Route::get('material/create', [MaterialController::class, 'create'])->name('master.material.create');
    Route::post('material', [MaterialController::class, 'store'])->name('master.material.store');
    Route::get('material/{id}/edit', [MaterialController::class, 'edit'])->name('master.material.edit');
    Route::put('material', [MaterialController::class, 'update'])->name('master.material.update');
    Route::delete('material/{id}', [MaterialController::class, 'destroy'])->name('master.material.destroy');
});

// Purchase Order Routes
Route::prefix('purchase')->group(function () {
    Route::get('purchase-orders', [PurchaseOrderController::class, 'index'])->name('purchase.purchase-orders.index');
    Route::get('purchase-orders/create', [PurchaseOrderController::class, 'create'])->name('purchase.purchase-orders.create');
    Route::post('purchase-orders', [PurchaseOrderController::class, 'store'])->name('purchase.purchase-orders.store');
    Route::get('purchase-orders/{id}/edit', [PurchaseOrderController::class, 'edit'])->name('purchase.purchase-orders.edit');
    Route::put('purchase-orders/{id}', [PurchaseOrderController::class, 'update'])->name('purchase.purchase-orders.update');
    Route::delete('purchase-orders/{id}', [PurchaseOrderController::class, 'destroy'])->name('purchase.purchase-orders.destroy');
});

