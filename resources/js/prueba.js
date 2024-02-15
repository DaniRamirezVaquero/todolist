document.querySelectorAll('.icono-completado, .icono-incompleto').forEach(function(icono) {
  icono.addEventListener('click', function() {
      var id = this.dataset.id;
      var esCompletado = this.classList.contains('icono-completado');
      var url = '/tareas/' + id + '/' + (esCompletado ? 'incompletar' : 'completar');

      fetch(url, {
          method: 'POST',
          headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
      }).then(function(response) {
          return response.json();
      }).then(function(data) {
          if (data.success) {
              // Aquí puedes actualizar la interfaz de usuario para reflejar el nuevo estado de la tarea
              // Por ejemplo, puedes cambiar la clase del icono y actualizar el texto de la tarea
              icono.classList.toggle('icono-completado');
              icono.classList.toggle('icono-incompleto');
          }
      });
  });
});
