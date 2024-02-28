<div
    {{ $attributes->merge(['class' => 'mb-2 w-14 h-14 bg-gray-700 rounded-full shadow ring ring-green-500 ring-offset-4 ring-offset-gray-900 border border-transparent hover:border-2 hover:border-green-500 hover:ring-0 hover:ring-offset-0 hover:ring-offset-gray-900 ease-in-out duration-300']) }}>
    <a href="{{ route('task.new') }}" class="flex items-center justify-center w-full h-full">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40px" height="40px">
            <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                stroke-width="3"
                d="M35.4,38.8c-3.2,2.4-7.1,3.9-11.4,3.9C13.7,42.7,5.3,34.3,5.3,24c0-2.6,0.6-5.2,1.5-7.4" />
            <path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                stroke-width="3" d="M12.1,9.6C15.3,7,19.5,5.3,24,5.3c10.3,0,18.7,8.4,18.7,18.7c0,2.3-0.4,4.5-1.2,6.6" />
            <line x1="24" x2="24" y1="14" y2="34" fill="none" stroke="#FFFFFF"
                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
            <line x1="34" x2="14" y1="24" y2="24" fill="none" stroke="#FFFFFF"
                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
        </svg>
    </a>
</div>
