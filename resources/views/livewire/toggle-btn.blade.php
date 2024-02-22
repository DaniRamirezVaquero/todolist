<button wire:click="toggle" {{ $attributes->merge(['class' => 'rounded p-2 bg-green-500']) }}>
  {{ $state }}
</button>
