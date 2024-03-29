<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\View\Components\Todolist\TodoCalendar;
use App\View\Components\Todolist\TodoConfig;
use App\View\Components\Todolist\TodoSearchBar;
use App\View\Components\Todolist\TodoSelectLang;
use Illuminate\Support\Facades\Auth;

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
  Route::delete('/usuario/delete', [UsuarioController::class, 'delete'])->name('usuario.delete');

  Route::get('/newTask', [TareaController::class, 'new'])->name('task.new');

  Route::post('/task', [TareaController::class, 'create'])->name('task.create');
  Route::get('/task/check/{id}' , [TareaController::class, 'check'])->middleware('task_owner')->name('task.check');
  Route::get('/task/uncheck/{id}' , [TareaController::class, 'uncheck'])->middleware('task_owner')->name('task.uncheck');
  Route::delete('/task/delete/{id}', [TareaController::class, 'delete'])->name('task.delete');
  Route::get('/task/edit/{id}', [TareaController::class, 'edit'])->middleware('task_owner')->name('task.edit');
  Route::patch('/task/{id}', [TareaController::class, 'update'])->middleware('task_owner')->name('task.update');

  Route::get('/tasks/day/{date}', [TareaController::class, 'getTasksByDay'])->name('tasks.day');

  Route::post('/main', [TodoSearchBar::class, 'search'])->name('task.search');

  Route::view('/config', 'usuario.config')->name('config');
  Route::get('/config/lang/{lang}', [TodoSelectLang::class, 'setLanguage'])->name('config.lang');

  Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
  })->name('logout');

  Route::delete('/tareas/deleteAll', [TareaController::class, 'deleteAll'])->name('tareas.deleteAll');

  Route::view('/calendar', 'usuario.calendar')->name('calendar');

  Route::get('/calentar/nextMonth', [TodoCalendar::class, 'nextMonth'])->name('calendar.nextMonth');
  Route::get('/calentar/previousMonth', [TodoCalendar::class, 'previousMonth'])->name('calendar.previousMonth');

  Route::get('/admin/users', [AdminController::class, 'adminUsers'])->middleware('is_admin')->name('admin.users');
  Route::get('/admin/user/{id}', [AdminController::class, 'adminUser'])->middleware('is_admin')->name('admin.user');
  Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('is_admin')->name('admin.user.delete');
  Route::view('/admin/register', 'admin.admin-register')->middleware('is_admin')->name('admin.register');
  Route::post('/admin/register', [AdminController::class, 'register'])->middleware('is_admin')->name('admin.register.post');
});

require __DIR__ . '/auth.php';
