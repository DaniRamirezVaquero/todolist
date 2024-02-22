@extends('layouts.login_register')

@section('form')
    <form action="{{ route('register') }}" method="post" class="flex flex-col justify-center">
        @csrf
        <span class="mb-1.5 mt-6 text-2xl font-sans font-bold text-gray-900 text-center"> {{ __('todolist.new_account') }}
        </span>
        <hr class="mb-6">

        <div class='grid gap-2'>

            <!-- Name -->
            <div>
                <x-todolist.todo-input-light id="nombre" class="block w-full" type="text" name="nombre" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="{{ __('Name') }}" />
            </div>

            <!-- LastName -->
            <div>
                <x-todolist.todo-input-light id="apellido" class="block w-full" type="text" name="apellido"
                    :value="old('apellido')" required autofocus autocomplete="family-name" placeholder="{{ __('Last name') }}" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-todolist.todo-input-light class="w-60" type='email' name='email' :value="old('email')"
                    placeholder="{{ __('E-Mail Address') }}" autofocus required autocomplete="off" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-todolist.todo-input-light class="w-60" type='password' name='password'
                    placeholder="{{ __('Password') }}" required autocomplete="current-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-todolist.todo-input-light id="password_confirmation" class="block w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password"
                    placeholder="{{ __('Confirm Password') }}" />
            </div>

            <x-todolist.todo-primary-button
                class="mt-2 justify-center">{{ __('todolist.register') }}</x-todolist.todo-primary-button>
        </div>
    </form>

    <x-todolist.todo-alerta :$errors />

    <div class="flex justify-center mt-4 w-full">
        <p class="text-xs text-gray-300"> {{ __('todolist.registed') }} </p>
        <a href="{{ route('login') }}"
            class="text-xs text-gray-200 hover:text-gray-100 ml-1 underline">{{ __('Login') }}</a>
    @endsection
