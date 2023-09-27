<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// controller
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;

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

Route::get('/', [MainController::class, 'index'])->name('welcome');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(
        function () {
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

            Route::resource('/projects', ProjectController::class);

            Route::resource('/types', TypeController::class);

            Route::resource('/technologies', TechnologyController::class);
        }
    );

require __DIR__ . '/auth.php';
