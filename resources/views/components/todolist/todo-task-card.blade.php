<div class="bg-[{{ $tarea->etiqueta->color }}]/25 flex mb-4 items-center rounded p-3 px-6">
  @includeWhen($tarea->completa, 'components.todolist.todo-tarea-completa', [
      'id' => $tarea->id,
  ])
  @includeWhen(!$tarea->completa, 'components.todolist.todo-tarea-incompleta', [
      'id' => $tarea->id,
  ])
  <li class="w-4/5 text-center">{{ $tarea->texto }}</li>
  <li class="w-1/5 text-grey-darkest text-wrap text-center">
      {{ $tarea->fecha->format('d/m/Y') }}</li>
</div>
