@extends('layouts.app')
<!-- TODO: langs -->
@section('main')
<div class="relative min-h-screen w-screen flex flex-col items-center">
  <main class="bg-gray-800 rounded p-6 w-1/2 text-zinc-100 mt-14 shadow-lg">
      <h1 class="my-0 text-xl">@lang('todolist.calendar')</h1>
      <x-todolist.todo-calendar/>

  </main>
  <div class="absolute bottom-0 right-0 mb-16 mr-16 flex flex-col gap-6">
      <x-todolist.todo-new-task-btn />
      <x-todolist.todo-home-btn />
      <x-todolist.todo-config-btn />
  </div>
</div>
@endsection
