@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <div class="text-zinc-100 w-1/2 rounded-xl mt-20 shadow-lg">
            <main class="bg-gray-800 rounded shadow p-6 w-full">
                <h1 class="my-0 text-xl">Tus tareas</h1>
                <p class="mt-0 mb-3 w-full text-right">@lang('Hello!') {{ $usuario->nombre }}</p>

                <ul>
                    @forelse ($tareas as $tarea)
                        <div class="bg-gray-700 flex mb-4 items-center rounded p-3 px-6">
                            @includeWhen($tarea->completa, 'components.todolist.todo-tarea-completa', [
                                'id' => $tarea->id,
                            ])
                            @includeWhen(!$tarea->completa, 'components.todolist.todo-tarea-incompleta', [
                                'id' => $tarea->id,
                            ])
                            <li class="w-4/5 text-center">{{ $tarea->texto }}</li>
                            <li class="w-1/5 text-grey-darkest text-wrap text-center">
                                {{ $tarea->fecha->format('d/m/Y') }}</li>
                        </div>
                    @empty
                        <li>No tienes tareas... ¡Añade una!</li>
                    @endforelse
                </ul>
            </main>
        </div>
        <div class="absolute bottom-0 right-0 mb-10 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-config-btn />
        </div>
    </div>
@endsection
