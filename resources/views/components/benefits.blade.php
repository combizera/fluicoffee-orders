<section class="my-30">
  {{-- TITLE --}}
  <div class="max-w-7xl mx-auto flex justify-center relative">
    <h2 class="title max-w-[500px] w-full text-coffee-400 text-center pt-8 px-6 pb-2 text-3xl md:text-4xl bg-coffee-700 rounded-t-[30px] rounded-b-none relative before:absolute">
      Torrefação Sob <strong>Medida</strong>

       <x-icons.corner-left
         class="rotate-90 top-0 left-0 -translate-x-[80px]"
       />

      <x-icons.corner-left
        class="rotate-90 top-0 right-0 translate-x-[80px] -scale-y-100"
      />
    </h2>
  </div>

  {{-- GRID --}}
  <div class="bg-coffee-700 flex flex-col gap-8 items-center pb-10">
    <ul class="max-w-7xl mx-auto p-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 gap-y-20 pt-30 divide-x divide-coffee-400/50">
      <x-benefit.item
        icon="internet"
        title="Faça Seu Pedido Online"
        description="Acesse nossa plataforma e especifique: quantidade (peso), ponto de torra, tipo de moagem e embalagem desejada. Em poucos cliques, seu pedido está registrado."
        class="last:border-none"
      />

      <x-benefit.item
        icon="coffee"
        title="Entregue Seu Café "
        description="Traga seus grãos até nossa torrefação em Santo Antônio do Jardim - SP. Validamos a qualidade, peso e registramos a entrada do seu lote no sistema."
        class="last:border-none"
      />

      <x-benefit.item
        icon="burn"
        title="Torrefação Profissional"
        description="Sua produção entra em processo com o perfil de torra que você escolheu. Acompanhe o status em tempo real pelo nosso sistema online."
        class="last:border-none"
      />

      <x-benefit.item
        icon="packing"
        title="Faça Seu Pedido Online"
        description="Receba seu café embalado, identificado e pronto para venda. Cada embalagem pode ter sua marca e informações personalizadas."
        class="last:border-none"
      />
    </ul>

    <x-btn.pri
      title="Solicite seu Orçamento"
      url="#contact"
      class="col-span-1 md:col-span-2 lg:col-span-4 text-center mx-auto"
    />
  </div>

  {{-- FOOTER --}}
  <div class="max-w-7xl mx-auto flex justify-center relative">
    <div class="max-w-[500px] w-full text-coffee-400 text-center pt-8 px-6 pb-2 text-3xl md:text-4xl h-[80px] bg-coffee-700 rounded-b-[30px] rounded-t-none relative before:absolute">

      <x-icons.corner-left
        class="top-0 left-0 -translate-x-[70px]"
      />

      <x-icons.corner-left
        class="top-0 right-0 rotate-180 translate-x-[70px] -scale-y-100"
      />
    </div>
  </div>
</section>
