<?php

use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PurchaseController;
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

    // Route to handle buy
    Route::put('{reward:id}/buy', [PurchaseController::class, 'buy'])->name('buy');

    // Routes to admin pages - only accessible if admin -> using middleware 'Admin'
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Redirect /admin to /admin/rewards
        Route::get('/', function () {
            return redirect()->route('admin.rewards.index');
        });

        // Routes for rewards
        Route::prefix('rewards')->name('rewards.')->group(function () {
            Route::get('/', [RewardController::class, 'index'])->name('index'); // Default rewards page
            Route::get('/create', [RewardController::class, 'create'])->name('create');
            Route::post('/store', [RewardController::class, 'store'])->name('store');

            // Routes to update, edit and delete single reward
            Route::prefix('{reward:id}')->name('reward.')->group(
                function () {
                    Route::post('/update', [RewardController::class, 'update'])->name('update');
                    Route::get('/edit', [RewardController::class, 'edit'])->name('edit');
                    Route::delete('/', [RewardController::class, 'destroy'])->name('destroy');
                }
            );
        });

        // Routes for users            
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index'); // Default users page
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');

            // Routes to update, edit and delete single user
            Route::prefix('{user:id}')->name('user.')->group(
                function () {
                    Route::put('/update', [UserController::class, 'update'])->name('update');
                    Route::get('/create', [UserController::class, 'edit'])->name('edit');
                    Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
                }
            );
        });
    });
});
