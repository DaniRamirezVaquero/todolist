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

Route::view('/', 'auth.login')->middleware('guest');
Route::get('/main', [UsuarioController::class, 'main'])->middleware('auth')->name('main');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/newTask', [TareaController::class, 'new'])->name('task.new');
  Route::post('/task', [TareaController::class, 'create'])->name('task.create');
  Route::get('/task/check/{id}' , [TareaController::class, 'check'])->name('task.check');
  Route::get('/task/uncheck/{id}' , [TareaController::class, 'uncheck'])->name('task.uncheck');
  Route::delete('/task/{id}', [TareaController::class, 'delete'])->name('task.delete');
  Route::get('/task/edit/{id}', [TareaController::class, 'edit'])->name('task.edit');
  Route::patch('/task/{id}', [TareaController::class, 'update'])->name('task.update');
  Route::post('/task/search', [TareaController::class, 'search'])->name('task.search');
});

require __DIR__ . '/auth.php';
