@extends('layouts.app')

@section('main')
  <div class="flex flex-col items-center mt-24">
    <h1 class="font-mono text-zinc-100 text-3xl">{{config("app.name")}}</h1>
    <p class="italic text-zinc-100">"@lang('todolist.bienvenida')"</p>
    <img class="w-24 relative top-10 drop-shadow-xl" src="{{ asset('images/TodoListLogo.png') }}" alt="todoListLogo">
    <div class="flex flex-col items-center p-8 bg-slate-500 rounded-xl w-80">
      <form action="{{ route('login') }}" method="post" class="text-center flex flex-col justify-center">
        @csrf
        <span class="mb-1.5 mt-6 text-2xl font-sans font-bold text-gray-900">Log In</span>
        <hr class="mb-6">

        @php
          $old = old('email')??'admin@admin.com';
        @endphp

        <div class='grid gap-2'>
          <x-todolist.todo-input class="w-60" type='email' name='email' :valor=$old placeholder="{{__('todolist.Email-ph')}}" autofocus required autocomplete="off"/>
          <x-todolist.todo-input class="w-60" type='password' name='password' placeholder="{{__('todolist.Password-ph')}}" required autocomplete="current-password"/>
          <x-todolist.todo-primary-button class="mt-2 justify-center">{{__('Login')}}</x-todolist.todo-primary-button>
        </div>

        <x-todolist.todo-alerta :$errors/>
      </form>
    </div>
  </div>
@endsection
