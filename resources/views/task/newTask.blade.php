@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/3 text-zinc-100 mt-20 shadow-lg">
            <h1 class="my-0 text-xl">Nueva Tarea</h1> <!-- TODO lang -->
            <form action="{{ route('task.create') }}" method="post" class="mt-6">
                @csrf
                <div class="grid grid-cols-1 w-full gap-6">
                    {{-- Tarea --}}
                    <div>
                        <x-todolist.todo-input-label for="tarea">Tarea</x-todolist.todo-input-label> <!-- TODO lang -->
                        <x-todolist.todo-input type="text" class="w-full" id="tarea" name="tarea"
                            placeholder="¿Qué tiene que hacer?" :value="old('tarea')"></x-todolist.todo-input>
                    </div>

                    <div>
                        {{-- Fecha --}}
                        <x-todolist.todo-input-label for="fecha">Fecha</x-todolist.todo-input-label> <!-- TODO lang -->
                        <x-todolist.todo-input type="date" class="w-full" id="fecha"
                            name="fecha" :value="old('fecha')"></x-todolist.todo-input>
                    </div>

                    <div>
                        {{-- Etiqueta --}}
                        <x-todolist.todo-input-label for="etiqueta">Etiqueta</x-todolist.todo-input-label>
                        <!-- TODO lang -->
                        <x-todolist.todo-select name="etiqueta" id="etiqueta" :value="old('etiqueta')">
                            <option value="" hidden>Selecciona una etiqueta</option>
                            @foreach ($etiquetas as $etiqueta)
                                <option value="{{ $etiqueta->id }}" class="{{$etiqueta->color}}">{{ $etiqueta->etiqueta }}</option>
                            @endforeach
                        </x-todolist.todo-select>
                    </div>

                    <div class="flex justify-end">
                        <x-todolist.todo-primary-button type="submit">Añadir</x-todolist.todo-primary-button>
                    </div>
            </form>
        </main>
        <div class="absolute bottom-0 right-0 mb-10 mr-16 flex flex-col gap-6">
            <x-todolist.todo-cancel-btn />
            <x-todolist.todo-config-btn />
            <x-todolist.todo-logout-btn />
        </div>
    </div>
@endsection
