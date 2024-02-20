@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/3 text-zinc-100 mt-20 shadow-lg">
            <h1 class="my-0 text-xl">@lang('todolist.newTask')</h1>
            <form action="{{ route('task.create') }}" method="post" class="mt-6">
                @csrf
                <div class="grid grid-cols-1 w-full gap-6">
                    {{-- Tarea --}}
                    <div>
                        <x-todolist.todo-input-label for="tarea">@lang('todolist.task')</x-todolist.todo-input-label>
                        <x-todolist.todo-input type="text" class="w-full" id="tarea" name="tarea" required
                            placeholder="¿Qué tiene que hacer?" :value="old('tarea')"></x-todolist.todo-input>
                    </div>

                    <div>
                        {{-- Fecha --}}
                        <x-todolist.todo-input-label for="fecha">@lang('todolist.date')</x-todolist.todo-input-label>
                        <x-todolist.todo-input type="date" class="w-full" id="fecha" required name="fecha"
                            :value="old('fecha')"></x-todolist.todo-input>
                    </div>

                    <div>
                        {{-- Etiqueta --}} <!-- TODO No se envia -->
                        <x-todolist.todo-input-label for="etiqueta" required>@lang('todolist.tag')</x-todolist.todo-input-label>
                        {{-- <x-todolist.todo-select-tag name="etiqueta" id="etiqueta" :$etiquetas/> --}}
                        <select class="w-full rounded-md text-gray-200 bg-slate-700 text-sm" name="etiqueta" id="etiqueta"
                            :value="old('etiqueta')">
                            <option value="" class="bg-purple-500/30">@lang('todolist.none')</option>
                            @foreach ($etiquetas as $etiqueta)
                                <option value="{{ $etiqueta->idEti }}" class="{{ $etiqueta->color }}">
                                    {{ $etiqueta->etiqueta }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between">
                        <x-todolist.todo-alerta :$errors />
                        <x-todolist.todo-primary-button type="submit">@lang('todolist.add')</x-todolist.todo-primary-button>
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
