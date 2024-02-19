@extends('layouts.app')

@section('main')
<div class="flex flex-col items-center justify-center min-h-screen">
  <h1 class="font-mono text-zinc-100 text-3xl">{{config("app.name")}}</h1>
  <p class="italic text-zinc-100">"@lang('todolist.bienvenida')"</p>
  <img class="w-24 relative top-10 drop-shadow-xl" src="{{ asset('images/TodoListLogo.png') }}" alt="todoListLogo">
  <div class="flex flex-col items-center p-8 bg-slate-500 rounded-xl w-80">
    @section('form')
    @show
  </div>
</div>
@endsection
