@props([
  'title' => null,
  'link' => '#',
])
<li>
  <a href="{{ $link }}" class="text-sm font-bold hover:opacity-80 transition">
    {{ $title }}
  </a>
</li>
