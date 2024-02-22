@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/3 text-zinc-100 mt-20 shadow-lg">
            <h1 class="my-0 text-xl">@lang('todolist.editTask')</h1>
            <form action="{{ route('task.update', ['id' => $tarea->idTar]) }}" method="post" class="mt-6">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 w-full gap-6">
                    {{-- Tarea --}}
                    <div>
                        <x-todolist.todo-input-label for="tarea">@lang('todolist.task')</x-todolist.todo-input-label>
                        <x-todolist.todo-input-dark type="text" class="w-full" id="tarea" name="tarea" required
                            placeholder="¿Qué tiene que hacer?" :value="$tarea->tarea"></x-todolist.todo-input-dark>
                    </div>

                    <div>
                        {{-- Fecha --}}
                        <x-todolist.todo-input-label for="fecha">@lang('todolist.date')</x-todolist.todo-input-label>
                        <x-todolist.todo-input-dark type="date" class="w-full" id="fecha" required name="fecha"
                            :value="$tarea->fecha->format('Y-m-d')"></x-todolist.todo-input-dark>
                    </div>

                    <div>
                        {{-- Etiqueta --}}
                        <x-todolist.todo-input-label for="etiqueta" required>@lang('todolist.tag')</x-todolist.todo-input-label>
                        <x-todolist.todo-select-tag name="etiqueta" id="etiqueta" :$etiquetas :selectedTag="$tarea->etiqueta->idEti"/>
                    </div>

                    <div class="flex justify-between place-items-end">
                        <x-todolist.todo-alerta :$errors />
                        <x-todolist.todo-primary-button type="submit" class="border-2 border-green-500">
                          @lang('todolist.save')
                        </x-todolist.todo-primary-button>
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
