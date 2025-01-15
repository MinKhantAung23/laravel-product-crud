<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Web\VoucherController;

Route::get('/', function () {
  return redirect('login');
});

Route::get('/', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('vouchers', VoucherController::class);

Route::get('item/search/', [ItemController::class, 'search'])->name('item.search');
Route::get('item/searchDetail/', [ItemController::class, 'searchDetail'])->name('item.searchDetail');
Route::resource('item', ItemController::class);

Route::get('category/search/', [CategoryController::class, 'search'])->name('category.search');
Route::resource('category', CategoryController::class);




require __DIR__ . '/auth.php';
