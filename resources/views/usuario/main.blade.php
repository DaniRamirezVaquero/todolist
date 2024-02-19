@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <div class="text-zinc-100 w-1/2 rounded-xl mt-20 shadow-lg">
            <main class="bg-gray-800 rounded shadow p-6 w-full">
                <h1 class="my-0 text-xl">Tus tareas</h1>
                <p class="mt-0 mb-3 w-full text-right">@lang('Hello!') {{ $usuario->nombre }}</p>

                <ul>
                    @forelse ($tareas as $tarea)
                        <x-todolist.todo-task-card :$tarea />
                    @empty
                        <li>No tienes tareas... ¡Añade una!</li>
                    @endforelse
                </ul>
            </main>
        </div>
        <div class="absolute bottom-0 right-0 mb-10 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-config-btn />
            <x-todolist.todo-logout-btn />
        </div>
    </div>
@endsection
