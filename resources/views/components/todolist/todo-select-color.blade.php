<select name="colores" id="" class="bg-gray-800 text-gray-300 border border-gray-700 py-2 px-4 rounded-md pr-10">
  <option value="default" hidden>Selecciona un color de fondo</option>
  @foreach ($colores as $clave => $color)
    <option {{ $seleccionado($color) }} value="{{$color}}">{{$clave}}</option>
  @endforeach
</select>
