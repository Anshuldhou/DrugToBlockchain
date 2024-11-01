<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DrugController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


//Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//    ->name('login');
//
//Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//
//Route::get('/register', [RegisteredUserController::class, 'create'])
//    ->name('register');

// Show the registration form
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Handle form submission
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/drugs', [DrugController::class, 'index'])->name('drugs.index'); // View all drugs
Route::get('/drugs/create', [DrugController::class, 'create'])->name('drugs.create'); // Show form
Route::post('/drugs', [DrugController::class, 'store'])->name('drugs.store');         // Handle form submission
Route::get('/drugs/{id}/edit', [DrugController::class, 'edit'])->name('drugs.edit'); // Edit a specific drug
Route::put('/drugs/{id}', [DrugController::class, 'update'])->name('drugs.update');  // Update a drug
Route::delete('/drugs/{id}', [DrugController::class, 'destroy'])->name('drugs.destroy'); // Delete a drug
