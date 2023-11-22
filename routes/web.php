<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
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


// Routes to login page, store login and logout
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('store');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Routes to site - only accessible if logged in -> using middleware 'Authenticate' (sends the user to login if not authenticated)
Route::middleware('auth')->group(function () {
    // Route to main page/index
    Route::get('/', [MainController::class, 'index'])->name('index');

    // Routes to admin pages - only acccessible if admin -> using middleware 'Admin'
    Route::middleware('admin')->group(function () {
        // Route to admin page
        Route::prefix('admin', [AdminController::class])->name('admin.')->group(function () {
            Route::get('/rewards', [AdminController::class, 'rewards'])->name('rewards');
            Route::get('/users', [AdminController::class, 'users'])->name('users');
        });
    });
});
