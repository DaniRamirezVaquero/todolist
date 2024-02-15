<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/dashboard', [UsuarioController::class, 'main'])->middleware('auth')->name('dashboard');

// Route::post('/tareas/{id}/completar', 'TareaController@completar');
// Route::post('/tareas/{id}/incompletar', 'TareaController@incompletar');

// RUTAS PARA APRENDER
// Route::get('/bienvenidos', function () {
//     return view('bienvenidos');
// });

// Esto es lo mismo que lo de arriba
Route::view('/bienvenidos', 'bienvenidos');
Route::post('/bienvenidosPOST', function () {
  echo "Hola, he recibido el formulario por el método POST";
})->name('miruta');

// Es lo mismo que lo de arriba -> [Controlador, 'método']
Route::get('/colores/', [UsuarioController::class, 'mostrarPerfil'])->name('colores');;

// Se le puede pasar un parámetro opcional con el signo de interrogación
// Si no se le pasa nada, por defecto será 1
// Route::get('/usuario/{id?}', function ($id = 1) {
//     echo "<b>Perfil del usuario con id $id</b>";

//     $usuario = App\Models\Usuario::find($id);

//     echo "<br>Nombre: $usuario->nombre";
//     echo "<br>Apellido: $usuario->apellido";
//     echo "<br>Email: $usuario->email";
// });

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
