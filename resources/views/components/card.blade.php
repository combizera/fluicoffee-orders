@props([
  'title' => null,
  'description' => null,
  'image' => null,
  'button' => false,
])
<li class="flex flex-col items-start">
  <img
    alt="Benefício - {{ $title }}"
    class="rounded-xl h-[200px] w-full object-cover mb-4"
    loading="lazy"
    src="{{ Vite::image('roast.webp') }}"
  >
  <h3 class="font-bold text-2xl mb-1">
    {{ $title }}
  </h3>
  <p class="text-lg leading-[1.2] mb-4">
    {{ $description }}
  </p>
  @if($button)
    <x-btn.sec
      title="Entre em Contato"
    />
  @endif
</li>
