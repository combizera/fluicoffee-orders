<header class="header max-w-7xl mx-auto bg-coffee-700 min-h-20 py-0 px-8 text-coffee-400 flex items-center justify-between relative">

  {{-- CORNERS --}}
  <x-icons.corner-left />
  <x-icons.corner-right />

  {{-- LOGO --}}
  <div>
    <a href="{{ route('site.home') }}" class="hover:opacity-80 transition p-2">
      <x-icons.logo />
    </a>
  </div>

  {{-- CTA --}}
  <div>
    <x-btn.pri title="Entre em Contato" />
  </div>
</header>
