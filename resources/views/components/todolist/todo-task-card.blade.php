<div class="{{ $tarea->etiqueta->color }} flex mb-4 items-center rounded p-3 px-6">

    <div class="w-3/5">{{ $tarea->tarea }}</div>

    <div class="w-1/6 bg-white/25 rounded text-center font-semibold font-mono">
        @if ($tarea->etiqueta->idEti != 7)
            <div>#{{ $tarea->etiqueta->etiqueta }}</div>
        @endif
    </div>

    <div class="w-1/5 text-grey-darkest text-center">{{ $tarea->fecha->format('d/m/Y') }}</div>

    <div class="flex gap-2">
      @includeWhen($tarea->completa, 'components.todolist.icon.todo-tarea-completa')
      @includeWhen(!$tarea->completa, 'components.todolist.icon.todo-tarea-incompleta')
      <x-todolist.icon.todo-edit-task :$tarea/>
      <x-todolist.icon.todo-delete-task :$tarea/>
    </div>
</div>
