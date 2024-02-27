<div id="msg" class="absolute top-0 left-0 w-screen h-screen bg-black/40 justify-center items-center z-40"
    style="display: none;">
    <div class="p-6 bg-gray-700 rounded z-50">
        <h1 class="text-red-500">¿Estás seguro?</h1>
        <p>Esta acción no se puede deshacer</p>
        <div class="mt-4 flex justify-between">
            <x-todolist.todo-primary-button id="cancel">Cancelar</x-todolist.todo-primary-button>

            <form action="{{route('usuario.delete', [Auth::user()->idUsu])}}" method="POST">
              @csrf
              @method('DELETE')
              <x-todolist.todo-primary-button class="border-2 border-red-500">Eliminar</x-todolist.todo-primary-button>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('danger-btn').addEventListener('click', function() {
        var span = document.getElementById('msg');
        if (span.style.display === 'none') {
            span.style.display = 'flex';
        } else {
            span.style.display = 'none';
        }
    });

    document.getElementById('cancel').addEventListener('click', function() {
        var span = document.getElementById('msg');
        span.style.display = 'none'
    });
</script>
