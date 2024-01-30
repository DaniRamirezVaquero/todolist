
<div class="bg-black">
    <h5 class="">Hola, bienvenidos a mi sitio web!!</h5>

    <!-- form action="http://localhost/bienvenidosPOST" .... -->
    <form action="{{ route("miruta") }}" method="post">
        @csrf

        <button>Enviar</button>
    </form>
</div>
