<button wire:click="toggle"
    class="active:ring ease-in duration-150 p-2 rounded  flex justify-center items-center border border-green-500
    {{ $state ? 'bg-green-500 hover:bg-green-500/25' : 'hover:bg-green-500 bg-green-500/25' }}">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px" height="25px">
        <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
            stroke-width="3"
            d="M14.6,34.6l4,4c0.8,0.8,2,0.8,2.8,0l21.3-21.3c0.8-0.8,0.8-2,0-2.8l-4.4-4.4c-0.8-0.8-2-0.8-2.8,0L32,13.6" />
        <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
            stroke-width="3" d="M28,17.6l-8,8l-5.3-5.3c-0.8-0.8-2-0.8-2.8,0l-4.4,4.4c-0.8,0.8-0.8,2,0,2.8l3.3,3.3" />
    </svg>
</button>
