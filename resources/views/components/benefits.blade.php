<section class="px-10 grid grid-cols-2 gap-8 relative">
  {{-- TITLE --}}
  <div class="sticky top-4 h-fit">
    <h2 class="title text-4xl md:text-5xl leading-[1.2]">
      Alguns dos Nossos
      <br>
      <strong>
        Diferenciais
      </strong>
    </h2>
  </div>

  {{-- CARDS --}}
  <ul class="flex flex-col gap-30">
    <x-card
      title="Rastreabilidade Completa"
      description="Cada pedido recebe um código único. Você sabe exatamente onde seu café está no processo, a qualquer momento."
      button
      buttonText="Saiba Mais"
    />

    <x-card
      title="Atendimento Personalizado"
      description="Não somos uma indústria de massa. Conhecemos nossos parceiros produtores e entendemos as particularidades de cada safra e região."
    />

    <x-card
      title="Rapidez no Processo"
      description="Da entrada do café verde à torra final em poucos dias. Ideal para quem vende em feiras, eventos ou precisa atender pedidos rápidos de clientes."
    />

    <x-card
      title="Consultoria Sem Custo"
      description="Dúvidas sobre qual ponto de torra destacar o perfil sensorial do seu café? Ajudamos você a tomar a melhor decisão para seu produto."
      button
    />
  </ul>
</section>
