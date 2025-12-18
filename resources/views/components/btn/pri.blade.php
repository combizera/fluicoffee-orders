@props([
    'title' => 'Button',
    'link' => '#',
])
<a href="{{ $link }}" class="bg-coffee-400 text-coffee-700 p-2 rounded font-bold hover:opacity-80 transition">
    {{ $title }}
</a>
