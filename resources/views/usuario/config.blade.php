@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-1/2 text-zinc-100 mt-14 shadow-lg flex justify-center items-center flex-col pb-10">
            <h1 class="my-0 text-2xl self-left self-start">@lang('todolist.settings')</h1>
            <div class="grid gap-x-36 gap-y-8 grid-cols-2 mt-6 w-2/3">
              <x-todolist.todo-select-lang/>
              <a href="{{ route('logout') }}">
                <x-todolist.todo-primary-button class="border-2 border-white w-full h-full">@lang('todolist.logout')</x-todolist.todo-primary-button>
              </a>
              <div class="col-span-2">
                <h1 class="my-0 text-xl self-left self-start text-red-500">@lang('todolist.danger-zone')</h1>
                <hr class="w-full border border-red-500">
              </div>
              <x-todolist.todo-danger-btn id="delete-account" route="usuario.delete" message="{{ __('todolist.account-delete-msg') }}">
                @lang('todolist.delete-account')
              </x-todolist.todo-danger-btn>

              <x-todolist.todo-danger-btn id="delete-tasks" route="tareas.deleteAll" message="{{ __('todolist.delete-all-tasks-msg') }}">
                @lang('todolist.delete-all-tasks')
              </x-todolist.todo-danger-btn>
            </div>

        </main>
        <div class="absolute bottom-0 right-0 mb-16 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-home-btn />
        </div>
    </div>
@endsection
