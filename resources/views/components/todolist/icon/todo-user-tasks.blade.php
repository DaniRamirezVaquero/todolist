@props(['user'])

<a href="{{ route('admin.user' , ['id' => $user->idUsu]) }}">
  <div {{ $attributes->merge(['class' => 'active:ring ease-in duration-100 w-9 h-9 rounded bg-blue-500 flex justify-center items-center border border-blue-500 hover:bg-blue-500/25']) }}>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M36.1,7.5h2.4c1.1,0,2,0.9,2,2v3c0,1.1-0.9,2-2,2H18" />
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M13,14.5H9.5c-1.1,0-2-0.9-2-2v-3c0-1.1,0.9-2,2-2h21.3" />
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M13.3,27.5H9.5c-1.1,0-2-0.9-2-2v-3c0-1.1,0.9-2,2-2h20" />
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M35,20.5h3.5c1.1,0,2,0.9,2,2v3c0,1.1-0.9,2-2,2h-20" />
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M13.5,40.5h-4c-1.1,0-2-0.9-2-2v-3c0-1.1,0.9-2,2-2h19.6" />
      <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M34.2,33.5h4.3c1.1,0,2,0.9,2,2v3c0,1.1-0.9,2-2,2h-20" />
    </svg>
  </div>

</a>
