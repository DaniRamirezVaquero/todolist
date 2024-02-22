@props(['tarea'])

<form id="delete-form" method="POST" action="{{ route('task.delete', ['id' => $tarea->idTar ]) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<div
    {{ $attributes->merge(['class' => 'active:ring ease-in duration-150 w-9 h-9 rounded bg-red-500 flex justify-center items-center border border-red-500 hover:bg-red-500/25', 'onclick' => 'event.preventDefault(); document.getElementById("delete-form").submit();']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px" height="25px">
        <path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" stroke-width="3"
            d="M19.5,11.5V10c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5v1.5" />
        <line x1="8.5" x2="39.5" y1="11.5" y2="11.5" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" />
        <line x1="36.5" x2="36.5" y1="23.5" y2="11.5" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" />
        <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"
            d="M11.5,18.7v19.8c0,2.2,1.8,4,4,4h17c2.2,0,4-1.8,4-4V31" />
        <line x1="20.5" x2="20.5" y1="19.5" y2="34.5" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" />
        <line x1="27.5" x2="27.5" y1="19.5" y2="34.5" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" />
    </svg>
</div>
