<section class="my-30">
  {{-- TITLE --}}
  <div class="max-w-7xl mx-auto flex justify-center relative">
    <h2 class="title max-w-[500px] text-coffee-400 text-center pt-8 px-4 pb-2 text-3xl md:text-4xl bg-coffee-700 rounded-t-[30px] rounded-b-none">
      Torrefação Sob <strong>Medida</strong>
    </h2>
  </div>

  {{-- GRID --}}
  <div class="bg-coffee-700">
    <ul class="max-w-7xl mx-auto p-2 grid grid-cols-1 md:grid-cols-4 gap-8 pt-30 pb-20">
      <x-benefit.item
        icon="internet"
        title="Faça Seu Pedido Online"
        description="Acesse nossa plataforma e especifique: quantidade (peso), ponto de torra, tipo de moagem e embalagem desejada. Em poucos cliques, seu pedido está registrado."
      />

      <x-benefit.item
        icon="coffee"
        title="Entregue Seu Café "
        description="Traga seus grãos até nossa torrefação em Santo Antônio do Jardim - SP. Validamos a qualidade, peso e registramos a entrada do seu lote no sistema."
      />

      <x-benefit.item
        icon="burn"
        title="Torrefação Profissional"
        description="Sua produção entra em processo com o perfil de torra que você escolheu. Acompanhe o status em tempo real pelo nosso sistema online."
      />

      <x-benefit.item
        icon="packing"
        title="Faça Seu Pedido Online"
        description="Receba seu café embalado, identificado e pronto para venda. Cada embalagem pode ter sua marca e informações personalizadas."
      />

      <x-btn.pri
        title="Solicite seu Orçamento"
        url="#contact"
        class="col-span-1 md:col-span-4 text-center mx-auto"
      />
    </ul>
  </div>
</section>
