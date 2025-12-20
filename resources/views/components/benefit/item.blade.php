@props([
  'title' => null,
  'description' => null,
  'icon' => 'coffee',
])

<li class="text-coffee-400 flex flex-col items-start gap-2 pr-5">
  <x-dynamic-component component="icons.{{ $icon }}" />
  <h3 class="text-3xl mt-2 mr-10 font-semibold">
    {{ $title }}
  </h3>
  <p class="text-lg opacity-70">
    {{ $description }}
  </p>
</li>
