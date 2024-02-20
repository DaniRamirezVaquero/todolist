@props(['etiquetas'])

<select class="w-full rounded-md text-gray-200 bg-slate-700 text-sm">
  <option value="" hidden>Selecciona una etiqueta</option>
  @foreach ($etiquetas as $etiqueta)
      <option value="{{ $etiqueta->idEti }}" class="{{$etiqueta->color}}">{{ $etiqueta->etiqueta }}</option>
  @endforeach
</select>
