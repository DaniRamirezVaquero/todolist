@extends('layouts.app')

<!-- TODO: langs -->

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/2 text-zinc-100 mt-14 shadow-lg flex justify-center items-center flex-col">
            <h1 class="my-0 text-2xl self-left self-start">Ajustes</h1>
            <div class="grid gap-36 grid-cols-2 mt-6 w-2/3">
              <x-todolist.todo-select-lang/>
              <a href="{{ route('logout') }}">
                <x-todolist.todo-primary-button class="border-2 border-white w-full h-full ">Cerrar Sesion</x-todolist.todo-primary-button>
              </a>
            </div>
            <br>
            <h1 class="my-0 text-xl self-left self-start text-red-500">Danger Zone</h1>
            <hr class="w-full border border-red-500">
            <div class="grid gap-36 grid-cols-2 mt-6 w-2/3 mb-2">
                <x-todolist.todo-danger-btn>Eliminar Cuenta</x-todolist.todo-danger-btn>
            </div>
        </main>
        <div class="absolute bottom-0 right-0 mb-10 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-home-btn />
        </div>
    </div>
@endsection
