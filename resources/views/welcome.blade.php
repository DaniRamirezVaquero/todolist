@extends('layouts.app')

@section('main')
    <div class="flex flex-col items-center">
      <h1 class="font-mono text-zinc-100">@lang('todolist.appname')</h1>
      <p class="italic">"@lang("todolist.bienvenida")"</p>
      <img class="w-24 relative top-10 drop-shadow-xl" src="{{ asset('images/TodoListLogo.png') }}" alt="todoListLogo">
      <div class="flex flex-col items-center p-8 bg-slate-500 rounded-xl w-80">
          <form action="{{ route('login') }}" method="post" class="text-center flex flex-col justify-center">
              @csrf
              <span class="mb-1.5 mt-6 text-2xl font-sans font-bold">Log In</span>
              <hr class="mb-6">
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
      </div>
    </div>
@endsection
