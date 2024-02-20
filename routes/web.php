<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::view('/', 'welcome');
Route::get('/main', [UsuarioController::class, 'main'])->middleware('auth')->name('main');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/task', [TareaController::class, 'new'])->name('task.new');
  Route::post('/task', [TareaController::class, 'create'])->name('task.create');
});

require __DIR__ . '/auth.php';
