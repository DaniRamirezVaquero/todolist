<div id="danger-btn"
    {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer uppercase rounded font-semibold text-xs bg-gray-700 text-center px-4 py-2 ring-2 ring-red-500 ring-offset-4 ring-offset-slate-800 hover:ring hover:text-red-400 ease-in duration-300']) }}>
    {{ $slot }}
</div>

<x-todolist.todo-confirm-span/>
