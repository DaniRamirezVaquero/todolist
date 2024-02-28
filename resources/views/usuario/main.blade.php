@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/2 text-zinc-100 mt-14 shadow-lg">
            <h1 class="my-0 text-xl">@lang('todolist.yourTasks')</h1>
            <p class="mt-0 mb-3 w-full text-right font-mono">@lang('Hello') {{ $usuario->nombre }}!</p>

            <x-todolist.todo-search-bar class="mb-4" :oldSearch=$search/>
            <ul class="max-h-[675px] overflow-y-scroll">
                @forelse ($tareas as $tarea)
                    <x-todolist.todo-task-card :$tarea />
                @empty
                    <li>@lang('todolist.noTasks')</li>
                @endforelse
            </ul>
        </main>
        <div class="absolute bottom-0 right-0 mb-16 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-calendar-btn />
            <x-todolist.todo-config-btn />
        </div>
    </div>
@endsection
