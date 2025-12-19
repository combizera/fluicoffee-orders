@props([
    'title' => 'Button',
    'link' => '#',
])
<a href="{{ $link }}" class="text-lg bg-coffee-700 text-coffee-400 p-2 px-4 rounded font-bold hover:opacity-80 transition">
  {{ $title }}
</a>
