<?php

use App\Http\Controllers\Admin\CreditsController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\VoteController;
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

Route::middleware(['guest'])->group(function () {

    // Routes to login
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'create'])->name('create');
        Route::post('/', [LoginController::class, 'store'])->name('store');
    });
});

// Route to logout
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');



// Routes to site - only accessible if logged in -> using middleware 'Authenticate' (sends the user to login if not authenticated)
Route::middleware('auth')->group(function () {

    // REGULAR USER

    // Route to main page/index
    Route::get('/', [MainController::class, 'index'])->name('index');

    // Route to profile page
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('index');
        Route::get('redeemed', [RedeemController::class, 'index'])->name('redeemed');
        Route::get('settings', [ProfileController::class, 'edit'])->name('edit');
        Route::put('update', [ProfileController::class, 'update'])->name('update');
    });

    // Route to handle vote and redeem
    Route::put('{rewardId:id}/vote', [VoteController::class, 'vote'])->name('vote');
    Route::put('{rewardId:id}/redeem', [RedeemController::class, 'redeem'])->name('redeem');


    //  ADMIN
    // Routes to admin pages - only accessible if admin -> using middleware 'Admin'
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [MainController::class, 'admin'])->name('admin');

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

        // Routes for redeemed rewards           
        Route::prefix('redeemed')->name('redeemed.')->group(function () {
            Route::get('/', [RedeemController::class, 'index'])->name('index'); // Default purchases page
        });

        // Routes for credits            
        Route::prefix('credits')->name('credits.')->group(function () {
            Route::get('/', [CreditsController::class, 'index'])->name('index'); // Default credits page
            Route::put('/update', [CreditsController::class, 'update'])->name('update');
        });

        // Route for votes
        Route::put('/reset', [VoteController::class, 'reset'])->name('reset');
        Route::put('{rewardId:id}/vote', [VoteController::class, 'vote'])->name('vote');
    });
});
