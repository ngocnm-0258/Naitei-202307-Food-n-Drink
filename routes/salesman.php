<?php

use App\Http\Controllers\Salesman\SalesmanOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('salesman')->name('salesman.')->middleware(['auth', 'checkSalesman'])->group(function () {
    Route::get('orders', [SalesmanOrderController::class, 'index'])->name('order.index');
});
