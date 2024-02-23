@props(['oldSearch' => ''])

<div {{ $attributes->merge(['class' => 'w-full']) }}>
    <form action="{{ route('task.search') }}" method="POST" class="flex gap-2">
        @csrf
        <x-todolist.todo-input-dark type="text" name="search" class="w-full rounded p-2"
            placeholder="{{ __('todolist.searchTask') }}" value="{{ $oldSearch }}" />

        @livewire('toggle-btn')
        <input type="hidden" name="state" id="state" value="{{ $state }}">
        <x-todolist.icon.todo-search />
        <x-todolist.icon.todo-cancel-search />
    </form>
</div>
