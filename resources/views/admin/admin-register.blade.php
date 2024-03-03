@extends('layouts.login_register')

@section('form')
    <form action="{{ route('admin.register.post') }}" method="post" class="flex flex-col justify-center">
        @csrf
        <span class="mb-1.5 mt-6 text-2xl font-sans font-bold text-gray-900 text-center"> {{ __('admin.register') }}
        </span>
        <hr class="mb-6">

        <div class='grid gap-2'>

            <!-- Name -->
            <div>
                <x-todolist.todo-input-light id="nombre" class="block w-full" type="text" name="nombre" :value="old('nombre')"
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
    @endsection
