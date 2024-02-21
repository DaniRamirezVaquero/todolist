<div class="{{ $tarea->etiqueta->color }} flex mb-4 items-center rounded p-3 px-6">

    <div class="w-3/5">{{ $tarea->tarea }}</div>

    <div class="w-1/6 bg-white/25 rounded text-center">
        @if ($tarea->etiqueta->idEti != 7)
            <div>#{{ $tarea->etiqueta->etiqueta }}</div>
        @endif
    </div>

    <div class="w-1/5 text-grey-darkest text-center">{{ $tarea->fecha->format('d/m/Y') }}</div>

    @includeWhen($tarea->completa, 'components.todolist.todo-tarea-completa', [
        'id' => $tarea->id,
    ])
    @includeWhen(!$tarea->completa, 'components.todolist.todo-tarea-incompleta', [
        'id' => $tarea->id,
    ])

    <x-todolist.todo-edit-task-icon/>
</div>
