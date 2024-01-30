<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <style>

        .rojo {
            color: red;
        }

        .caja {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            /*Se pueden meter variables en el css */
            background-color: {{ $fondo }};
            color: {{ $tinta }};
        }
    </style>
</head>

<body>

    <h2>Perfil usuario</h2>
    <p><b>Nombre:</b> {{ $usuario->nombre }}</p>
    <p><b>Apellido:</b> {{ $usuario->apellido }}</p>
    <p><b>Correo:</b> {{ $usuario->email }}</p>
    <br>
    <hr>
    {{-- Tambien podmeos importar --}}
    @use ("\App\Models\Usuario")
    @use ("\Illuminate\View\Component\Attribute\AsClasses")

    {{-- @php// Podemos meter código PHP aquí
        $usuario2 = Usuario::find(2);
    @endphp

    <h2>Perfil usuario 2</h2>
    <p><b>Nombre:</b> {{ $usuario2->nombre }}</p>
    <p><b>Apellido:</b> {{ $usuario2->apellido }}</p>
    <p><b>Correo:</b> {{ $usuario2->email }}</p>

    <hr> --}}

    <hr>
    @php
        $total = count($usuarios);
        $danger = $total > 3;
    @endphp

    <h4>Lista de usuarios</h4>

    @empty($usuarios)
        <p>No hay usuarios</p>
    @endempty

    <ul>
        @foreach ($usuarios as $usuario)
            @if ($loop->first)
                <p>Los usuarios son:</p>
            @endif
            <li>{{ $loop->index + 1 }}  {{ $usuario }}</li>
        @endforeach
    </ul>

    <p>Número de usuarios: <span class="{{ $danger ? 'rojo' : '' }}">{{ $total }}</span></p>
    <br>
    <hr>
    <br>

    <form action="{{ route('colores') }}">
        <div class="flex">
            <div class="mr-2">
                <label for="fondo">Color fondo:</label>
                <select name="fondo" id="fondo">
                    <option value="default" hidden>Selecciona un color de fondo</option>
                    <option value="ff689d" @selected($fondo=="#ff689d")>Rosa</option>
                    <option value="109dfa" @selected($fondo=="#109dfa")>Azul</option>
                    <option value="02ac66" @selected($fondo=="#02ac66")>Verde</option>
                    <option value="e36b2c" @selected($fondo=="#e36b2c")>Naranja</option>
                    <option value="ef280f" @selected($fondo=="#ef280f")>Rojo</option>
                    <option value="e7d40a" @selected($fondo=="#e7d40a")>Amarillo</option>
                    <option value="c82a54" @selected($fondo=="#c82a54")>Magenta</option>
                    <option value="e69dfb" @selected($fondo=="#e69dfb")>Lila</option>
                </select>
            </div>

            <div>
                <label for="fondo">Color tinta:</label>
                <select name="tinta" id="tinta">
                    <option value="default" hidden>Selecciona un color de fondo</option>
                    <option value="ff689d" @selected($tinta=="#ff689d")>Rosa</option>
                    <option value="109dfa" @selected($tinta=="#109dfa")>Azul</option>
                    <option value="02ac66" @selected($tinta=="#02ac66")>Verde</option>
                    <option value="e36b2c" @selected($tinta=="#e36b2c")>Naranja</option>
                    <option value="ef280f" @selected($tinta=="#ef280f")>Rojo</option>
                    <option value="e7d40a" @selected($tinta=="#e7d40a")>Amarillo</option>
                    <option value="c82a54" @selected($tinta=="#c82a54")>Magenta</option>
                    <option value="e69dfb" @selected($tinta=="#e69dfb")>Lila</option>
                </select>
            </div>

            <div class="caja ml-5 font-bold text-xl">Tinta</div>

        </div>

        {{-- @foreach ($colores as $item )
            <input type="radio" name="prueba" id="{{$loop->index}}" value="Prueba"> {{$item}} <br>
        @endforeach
        <br> --}}

        <button>Confirmar</button>
        <input @disabled($fondo=="#e7d40a") type="text" placeholder="Este control funciona si el color del fondo != amarillo" class="mt-2 rounded bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </form>

</body>

</html>
