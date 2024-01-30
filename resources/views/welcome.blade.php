@extends('layouts.app')

@section('main')
    <img class="w-24 mb-5" src="{{ asset('images/TodoListLogo.png') }}" alt="todoListLogo">

    <form action="{{ route('login') }}" method="post" class="text-center flex flex-col justify-center w-1/3">
        @csrf
        <span class="mb-3 text-xl">Log In</span>
        <input class="rounded-md text-gray-800" type="email" name="email" id="email" placeholder="Email" required
            value="{{ old('email') }}">
        <input class="rounded-md text-gray-800" type="password" name="password" id="password" placeholder="Contraseña"
            required autocomplete="current-password">
        <input class="mt-3" type="submit" value="Entrar">

        @if ($errors)
            <span class="text-red-600 font-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </span>
        @endif
    </form>
@endsection
