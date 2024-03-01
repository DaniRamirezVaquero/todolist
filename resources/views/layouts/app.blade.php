<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Daniel RV">
    <meta name="description" content="Aplicacion de gestion de tareas">

    <title>@lang('todolist.appname') @yield('cabecera')</title>

    <!--Styles-->
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{asset('build/assets/app-GGaQrYaU.css')}}">



</head>

<body class="font-sans antialiased flex items-center content-center flex-col bg-gray-900 min-h-screen">
    @section('main')

    @show

    @livewireScripts
</body>

</html>
