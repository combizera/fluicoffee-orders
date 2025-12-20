<footer class="footer max-w-7xl mx-auto bg-coffee-700 min-h-20 pt-10 px-14 text-coffee-400 relative">

  {{-- CORNERS --}}
  <x-icons.corner-left
    class="-left-[80px] bottom-0 rotate-90"
  />
  <x-icons.corner-right
    class="-right-[70px]"
  />

  <div class="flex items-center justify-between">
    {{-- LOGO --}}
    <div class="flex flex-col gap-2 items-start">
      <a href="{{ route('site.home') }}" class="hover:opacity-80 transition">
        <x-icons.logo />
      </a>
      <p>
        Faça seu primeiro pedido.
      </p>
      <a href="#instagram" class="flex gap-2 items-center hover:opacity-70 transition">
        <div class="bg-coffee-400 w-6 h-6 flex items-center justify-center rounded-md">
          <x-icons.instagram />
        </div>
        <p>
          @fluicoffee
        </p>
      </a>
    </div>

    {{-- ITEMS --}}
    <ul>
      <h3 class="text-[#C3A08F] text-sm">
        Empresa
      </h3>
      <x-footer.item
        title="Contato"
        link="#"
      />
      <x-footer.item
        title="Orçamento"
        link="#"
      />
      <x-footer.item
        title="Sobre Nós"
        link="#"
      />
    </ul>
  </div>


  {{-- COPY --}}
  <p class="text-[#C3A08F] text-sm text-center mt-4 border-t border-coffee-400/30 py-2">
    © {{ date('Y') }} Fluicoffee. Feito com muito ❤️ e ☕.
  </p>
</footer>
