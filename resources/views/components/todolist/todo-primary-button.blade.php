<button {{ $attributes->merge(['type' => 'submit', 'class' => 'shadow-2xl h-8 inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-800 rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-700 hover:text-gray-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:text-gray-800 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
