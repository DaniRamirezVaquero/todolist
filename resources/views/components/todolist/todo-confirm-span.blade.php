@props(['id', 'message', 'route'])

<div id="{{ $id }}-span"
    class="absolute top-0 left-0 w-screen h-screen bg-black/40 justify-center items-center z-40 backdrop-blur-sm"
    style="display: none;">
    <div class="p-6 bg-gray-700 rounded z-50">
        <h1 class="text-lg">@lang('todolist.uSure')</h1>
        <p class="mb-8 text-red-500">@lang('todolist.canNotRevert')</p>
        <p>{{ $message }}</p>
        <div class="mt-4 flex justify-between">
            <x-todolist.todo-primary-button
                id="{{ $id }}-cancel">@lang('todolist.cancel')</x-todolist.todo-primary-button>

            <form action="{{ route($route) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-todolist.todo-primary-button
                    class="border-2 border-red-500">@lang('todolist.confirm')</x-todolist.todo-primary-button>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('{{ $id }}').addEventListener('click', function() {
        var span = document.getElementById('{{ $id }}-span');
        span.style.display = 'flex';
    });

    document.getElementById('{{ $id }}-cancel').addEventListener('click', function() {
        var span = document.getElementById('{{ $id }}-span');
        span.style.display = 'none'
    });
</script>
