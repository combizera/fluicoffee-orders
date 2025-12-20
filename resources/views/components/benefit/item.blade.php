@props([
  'title' => null,
  'description' => null,
  'icon' => 'coffee',
])

<li class="text-coffee-400 flex flex-col items-start gap-4 border-r border-color-[#F2EFE8] last:border-0 pr-5">
  <x-dynamic-component component="icons.{{ $icon }}" />
  <h3 class="text-3xl">
    {{ $title }}
  </h3>
  <p class="text-lg">
    {{ $description }}
  </p>
</li>
