<div
    {{ $attributes->merge(['class' => 'w-14 h-14 bg-gray-700 rounded-full shadow ring ring-red-500 ring-offset-4 ring-offset-gray-900 border border-transparent hover:border-2 hover:border-red-500 hover:ring-0 hover:ring-offset-0 hover:ring-offset-gray-900 ease-in-out duration-300']) }}>
    <a href="{{ route('main') }}" class="flex items-center justify-center w-full h-full">
        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </a>
</div>
