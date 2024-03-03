<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminUsers()
    {
        $users = Usuario::all();

        return view('admin.users', ['users' => $users]);
    }

    public function adminUser($id)
    {
        $user = Usuario::find($id);

        return view('usuario.main', ['usuario' => Auth::user(), 'tareas' => $user->tareas, 'search' => 'Tareas del usuario '.$user->nombre ]);
    }

    public function deleteUser($id)
    {
        $user = Usuario::find($id);
        $user->delete();

        return redirect()->route('admin.users');
    }

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
