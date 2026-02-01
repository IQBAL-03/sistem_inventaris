<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $itemCount = \App\Models\Item::count();
    $categoryCount = \App\Models\Category::count();
    return view('welcome', compact('itemCount', 'categoryCount'));
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('siswa.inventory.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('items', App\Http\Controllers\Admin\ItemController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::get('/borrowings', [App\Http\Controllers\Admin\BorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings/{borrowing}/approve', [App\Http\Controllers\Admin\BorrowingController::class, 'approve'])->name('borrowings.approve');
    Route::post('/borrowings/{borrowing}/reject', [App\Http\Controllers\Admin\BorrowingController::class, 'reject'])->name('borrowings.reject');
    Route::post('/borrowings/{borrowing}/returned', [App\Http\Controllers\Admin\BorrowingController::class, 'returned'])->name('borrowings.returned');
    

});

// Siswa Routes
Route::middleware(['auth', 'verified', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/inventory', [App\Http\Controllers\Siswa\InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/borrowings', [App\Http\Controllers\Siswa\BorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings', [App\Http\Controllers\Siswa\BorrowingController::class, 'store'])->name('borrowings.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
