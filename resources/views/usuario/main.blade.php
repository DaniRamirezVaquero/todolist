@extends('layouts.app')

@section('main')
  <header>
    <x-todolist.todo-navbar>
      <form action="{{route('logout')}}" method="post">
        @csrf
        <x-todolist.todo-primary-button type="submit" class="justify-center">{{__('Logout')}}</x-todolist.todo-primary-button>
      </form>
    </x-todolist.todo-navbar>
  </header>
  <div class="text-zinc-100 w-1/2 rounded-xl mt-24 shadow-lg bg-white">
    <main class="bg-gray-800 rounded shadow p-6 w-full">
        <h1 class="my-0">Tareas del usuario</h1>
        <p class="mt-0 mb-3 w-full text-right">@lang("Hello!") {{ $usuario->nombre }}</p>

        <ul>
            @forelse ($tareas as $tarea)
                <div class="bg-gray-700 flex mb-4 items-center rounded p-3 px-6">
                    @includeWhen($tarea->completa, 'components.todolist.todo-tarea-completa', [
                        'id' => $tarea->id,
                    ])
                    @includeWhen(!$tarea->completa, 'components.todolist.todo-tarea-incompleta', [
                        'id' => $tarea->id,
                    ])
                    <li class="w-1/5 text-grey-darkest text-wrap text-center">
                        {{ $tarea->fecha->format('d/m/Y') }}</li>
                    <li class="w-4/5 text-center">{{ $tarea->texto }}</li>
                </div>
            @empty
                <li>No tienes tareas... ¡Añade una!</li>
            @endforelse
        </ul>
    </main>
  </div>
@endsection
