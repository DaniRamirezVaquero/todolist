@extends('layouts.app')

@section('main')
    <div class="relative min-h-screen w-screen flex flex-col items-center">
        <main class="bg-gray-800 rounded p-6 w-2/3 text-zinc-100 mt-14 shadow-lg">
            <h1 class="my-0 text-xl mb-6">@lang('admin.user-administration')</h1>
            <div class="no-scrollbar max-h-[675px] overflow-y-scroll flex flex-col gap-4 rounded">
                @foreach ($users as $user)
                    @if (!$user->admin)
                        <div class="flex justify-between items-center bg-gray-900 p-2 rounded px-4 text-zinc-200">
                            <div class="w-1/4">
                                <div><span class="font-mono font-semibold">@lang('Name'): </span> {{ $user->nombre }}</div>
                                <div><span class="font-mono font-semibold">@lang('Last name'): </span> {{ $user->apellido }}</div>
                            </div>
                            <div class="w-1/2">
                                <div><span class="font-mono font-semibold">@lang('E-Mail Address'): </span> {{ $user->email }}</div>
                                <div><span class="font-mono font-semibold">@lang('admin.creation-date'): </span> {{ $user->created_at->format('d/m/Y') }}</div>
                            </div>
                            <div class="w-1/4">
                              <div><span class="font-mono font-semibold">@lang('todolist.tasks'): </span> {{ $user->tareas->count() }}</div>
                              <div><span class="font-mono font-semibold">@lang('admin.completed') </span> {{ $user->tareas->where('completa', true)->count() }}</div>
                            </div>
                            <div class="flex gap-3">
                              <x-todolist.icon.todo-user-tasks :$user />
                              <x-todolist.icon.todo-delete-user id="deleteUser{{$user->idUsu}}" route="{{route('admin.user.delete', ['id' => $user->idUsu])}}" message="{{__('admin.delete-user-msg', ['name' => $user->nombre])}}"/>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </main>
        <div class="absolute bottom-0 right-0 mb-16 mr-16 flex flex-col gap-6">
            <x-todolist.todo-new-task-btn />
            <x-todolist.todo-calendar-btn />
            <x-todolist.todo-home-btn />
            <x-todolist.todo-config-btn />
        </div>
    </div>
@endsection
