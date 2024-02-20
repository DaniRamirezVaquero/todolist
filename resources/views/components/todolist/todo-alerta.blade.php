@props(['errors'])

@if ($errors != null)
<div class="text-red-700 mt-4 font-semibold w-full">
  <ul>
    @foreach ($errors->all() as $error)
    <li class='danger-alert'>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
