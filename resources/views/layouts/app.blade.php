<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Daniel RV">
    <meta name="description" content="Aplicacion de gestion de tareas">

    <title>@lang('todolist.appname') @yield('cabecera')</title>

    <!--Styles-->
    @vite('resources/css/app.css')
    @stack('scripts')

</head>

<body class="font-sans antialiased flex items-center content-center flex-col bg-gray-900 min-h-screen">
    @section('main')
        <!-- Aqui va el contenido POR DEFECTO de la seccion main -->
        <p class="text-xl font-bold">@lang('todolist.bienvenida')</p>
    @show <!-- Cierre de la seccion main -->
</body>

</html>
