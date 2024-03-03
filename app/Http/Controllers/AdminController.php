<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Loads the users list view
     *
     * @return View
     */
    public function adminUsers(): View
    {
        $users = Usuario::all();

        return view('admin.users', ['users' => $users]);
    }

    /**
     * Loads the user view with the user's tasks for admin
     *
     * @param int $id
     * @return View
     */
    public function adminUser($id): View
    {
        $user = Usuario::find($id);

        return view('usuario.main', ['usuario' => Auth::user(), 'tareas' => $user->tareas, 'search' => 'Tareas del usuario '.$user->nombre ]);
    }

    /**
     * Deletes a user
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function deleteUser($id): RedirectResponse
    {
        $user = Usuario::find($id);
        $user->delete();

        return redirect()->route('admin.users');
    }

    /**
     * Validates and registers a new admin
     *
     * @return View
     */
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:usuario',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new Usuario();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->admin = true;
        $user->save();


        return redirect()->route('admin.users');
    }
}
