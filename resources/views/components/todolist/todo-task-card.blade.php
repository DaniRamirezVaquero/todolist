<div class="{{ $tarea->etiqueta->color ?? 'bg-purple-500/30'}} flex mb-4 items-center rounded p-3 px-6">

    <div class="w-3/5">{{ $tarea->tarea }}</div>
    <div class="px-2 bg-white/25 rounded">#{{ $tarea->etiqueta->etiqueta ?? '' }}</div>
    <div class="w-2/5 text-grey-darkest text-center">{{ $tarea->fecha->format('d/m/Y') }}</div>

    @includeWhen($tarea->completa, 'components.todolist.todo-tarea-completa', [
        'id' => $tarea->id,
    ])
    @includeWhen(!$tarea->completa, 'components.todolist.todo-tarea-incompleta', [
        'id' => $tarea->id,
    ])
</div>
