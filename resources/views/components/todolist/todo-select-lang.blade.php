<div>
  <select id="language-selector"
      {{ $attributes->merge(['class' => 'w-full rounded text-gray-200 bg-gray-800 text-sm border-2 border-white']) }}>
      <option value="" hidden>@lang('todolist.selectLanguage')</option>
      <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>🇪🇸 @lang('todolist.es')</option>
      <hr>
      <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇬🇧 @lang('todolist.en')</option>
  </select>
</div>

<script>
  document.getElementById('language-selector').addEventListener('change', function() {
      // Aquí puedes redirigir a la URL correspondiente o realizar una solicitud AJAX para cambiar el idioma
      // Por ejemplo, podrías redirigir a una URL como '/set-language/' + this.value
      window.location.href = '/config/lang/' + this.value;
  });
</script>
