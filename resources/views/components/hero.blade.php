<section class="grid grid-cols-3 gap-4 items-center py-20 px-2">
  {{-- TITLE --}}
  <div class="flex flex-col items-start gap-4 col-span-2">
    <h1 class="title text-4xl md:text-5xl lg:text-6xl leading-[1.2] pr-0 md:pr-20">
      Seu Parceiro <strong>Especializado </strong>em <strong>Torrefação </strong>de Café Site
    </h1>

    <x-btn.sec
      title="Solicite seu Orçamento"
    />
  </div>

  {{-- DESCRIPTION --}}
  <div>
    <p class="text-lg">
      Da colheita à xícara: oferecemos <strong>torrefação</strong> profissional que valoriza o trabalho do produtor. Controle total sobre ponto de torra, moagem e embalagem do seu café.
    </p>
  </div>

  <div class="col-span-3 mt-8">
    <img
      alt="Imagem de um Torrador de Café - FluiCoffee"
      class="rounded-xl h-[400px] w-full object-cover"
      src="{{ Vite::image('roast.webp') }}"
    >
  </div>
</section>
