@props(['tarea'])

<a href="{{route('task.edit', ['id' => $tarea->idTar])}}">
  <div {{ $attributes->merge(['class' => 'active:ring ease-in duration-100 w-9 h-9 rounded bg-blue-500 flex justify-center items-center border border-blue-500 hover:bg-blue-500/25']) }}>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px" height="25px">
    <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18.4,21.8L32.1,8.1c2.3-2.3,6-2.1,8.1,0.4c1.8,2.2,1.5,5.5-0.5,7.5l-2.8,2.8" />
    <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M32.5,23.3L17.9,37.8c-0.4,0.4-0.8,0.6-1.3,0.8L6.5,41.5l2.9-10.1c0.1-0.5,0.4-0.9,0.8-1.3l3.7-3.7" />
    <line x1="29.1" x2="36.9" y1="11.1" y2="18.9" fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
  </svg>
  </div>

</a>
