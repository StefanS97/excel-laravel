<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('index');

// Excel routes
Route::get('/export', [UserController::class, 'export'])->name('export');
Route::post('/import', [UserController::class, 'import'])->name('import');

// PDF route
Route::get('pdf', [UserController::class, 'pdf'])->name('pdf');