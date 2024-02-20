@extends('layouts.app')

@section('main')
<div class="relative min-h-screen w-screen flex flex-col items-center">
  <main class="bg-gray-800 rounded p-6 w-1/2 text-zinc-100 mt-20 shadow-lg">
      <h1 class="my-0 text-xl">Tus tareas</h1> <!-- TODO lang -->
      <p class="mt-0 mb-3 w-full text-right">@lang('Hello!') {{ $usuario->nombre }}</p>

      <ul>
          @forelse ($tareas as $tarea)
              <x-todolist.todo-task-card :$tarea />
          @empty
              <li>No tienes tareas... ¡Añade una!</li> <!-- TODO lang -->
          @endforelse
      </ul>
  </main>
  <div class="absolute bottom-0 right-0 mb-10 mr-16 flex flex-col gap-6">
      <x-todolist.todo-new-task-btn />
      <x-todolist.todo-config-btn />
      <x-todolist.todo-logout-btn />
  </div>
</div>
@endsection
