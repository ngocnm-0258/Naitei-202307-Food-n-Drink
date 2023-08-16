<?php

use App\Http\Controllers\Admin\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
});
