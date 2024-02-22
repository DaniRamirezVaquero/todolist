@extends('layouts.login_register')

@section('form')
    <form action="{{ route('login') }}" method="post" class="text-center flex flex-col justify-center">
        @csrf
        <span class="mb-1.5 mt-6 text-2xl font-sans font-bold text-gray-900"> {{__('todolist.login')}} </span>
        <hr class="mb-6">

        <div class='grid gap-2'>
            <x-todolist.todo-input-light class="w-60" type='email' name='email' :value="old('email')"
                placeholder="{{ __('E-Mail Address') }}" autofocus required autocomplete="off" />
            <x-todolist.todo-input-light class="w-60" type='password' name='password' placeholder="{{ __('Password') }}"
                required autocomplete="current-password" />
            <x-todolist.todo-primary-button class="mt-2 justify-center">{{ __('Login') }}</x-todolist.todo-primary-button>
        </div>
    </form>
    <div><x-todolist.todo-alerta :$errors /></div>

    <div class="flex justify-center mt-4">
        <p class="text-xs text-gray-300"> {{ __('todolist.not_registed') }} </p>
        <a href="{{ route('register') }}"
            class="text-xs text-gray-200 hover:text-gray-100 ml-1 underline">{{ __('todolist.new_account') }}</a>
@endsection
