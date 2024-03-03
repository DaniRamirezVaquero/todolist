<div class="{{ $tarea->etiqueta->color }} xl:flex items-center rounded p-3 px-6 grid grid-cols-2">

    @if (Auth::user()->admin)
        <div class="mr-2 font-bold font-mono">Usuario: {{ $tarea->usuario->nombre }}</div>
    @endif

    <div class="w-3/5">{{ $tarea->tarea }}</div>

    <div class="xl:w-1/6 min-w-1/2 flex justify-start">
        <div class="bg-white/25 rounded text-center font-semibold font-mono justify-self-end w-min py-1.5 px-3 text-nowrap">#{{ $tarea->etiqueta->etiqueta }}</div>
    </div>

    <div class="w-1/5 text-grey-darkest text-center">{{ $tarea->fecha->format('d/m/Y') }}</div>

    <div class="flex gap-2 justify-end">
        @includeWhen($tarea->completa, 'components.todolist.icon.todo-tarea-completa')
        @includeWhen(!$tarea->completa, 'components.todolist.icon.todo-tarea-incompleta')
        <x-todolist.icon.todo-edit-task :$tarea />
        <x-todolist.icon.todo-delete-task :$tarea />
    </div>
</div>
