<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

// Főoldal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (auth + verified middleware)
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile route-ok auth middleware-rel
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Transaction CRUD
    Route::get('/new_transaction', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/new_transaction', [TransactionController::class, 'store'])->name('transactions.store');
});




// Transaction CRUD (Read rész) route-ok
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');


// Szerkesztő űrlap megjelenítése
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');

// Tranzakció frissítése
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');

// Tranzakció törlése
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');


// Auth route-ok betöltése (login, register, stb.)
Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');

Route::get('/limits', [\App\Http\Controllers\LimitController::class, 'index'])->middleware(['auth', 'verified'])->name('limits.index');

require __DIR__.'/auth.php';
