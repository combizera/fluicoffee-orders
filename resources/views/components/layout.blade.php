@props([
    'title' => null,
    'resume' => null,
    'image' => null,
])

@php
  $title = !empty($title) ? trim($title) : config('app.name');
@endphp

  <!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    {{ $title }} -  {{ config('app.name') }}
  </title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireScripts

  {{-- SEO [Title/Description/Favicon/Canonical] --}}
  <x-seo :$title :$resume />

  {{-- OG Meta Tags --}}
  <x-seo.og-tags :$title :$resume :$image />

  {{-- Twitter Meta Tags --}}
  <x-seo.twitter-tags :$title :$resume />

  {{-- FONTS --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen">

{{-- MAIN --}}
<main class="text-coffee-700 bg-coffee-400">
  {{-- HEADER --}}
  <x-header />

  {{-- CONTENT --}}
  <div class="max-w-7xl mx-auto p-2">
    {{ $slot }}
  </div>

  {{-- FOOTER --}}
  <x-footer />
</main>
</body>
</html>
