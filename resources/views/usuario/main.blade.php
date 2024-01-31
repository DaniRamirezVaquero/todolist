<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>

    <!--Styles-->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">

</head>

<body class="antialiased ">
    <header>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    </header>
    <div class="bg-gray-900 rounded shadow p-6 w-full">
        <h1 class="my-0">Tareas del usuario</h1>
        <p class="mt-0 mb-3 w-full text-right">Hola, {{$usuario->nombre}}</p>

        <ul>
            @forelse ($tareas as $tarea)
                <div class="bg-gray-800 flex mb-4 items-center rounded p-3 px-6">
                    @includeWhen($tarea->completa, 'components.tarea-completa')
                    @includeWhen(!$tarea->completa, 'components.tarea-incompleta')
                    <li class="w-1/5 text-grey-darkest text-wrap text-center">
                        {{ $tarea->fecha->format('d/m/Y') }}</li>
                    <li class="w-4/5 text-grey-darkest">{{ $tarea->texto }}</li>
                </div>
            @empty
                <li>No tienes tareas... ¡Añade una!</li>
            @endforelse
        </ul>
    </div>

</body>

</html>
