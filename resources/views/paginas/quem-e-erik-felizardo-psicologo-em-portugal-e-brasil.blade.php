<x-layouts.artigo :slug="$slug">
    <figure class="mb-10 overflow-hidden rounded-marca sm:float-right sm:mb-6 sm:ml-8 sm:w-64">
        <picture>
            <source type="image/webp" srcset="{{ asset('assets/fotos/erik-dos-santos-felizardo-480.webp') }} 480w, {{ asset('assets/fotos/erik-dos-santos-felizardo-800.webp') }} 800w" sizes="(min-width: 640px) 256px, 92vw">
            <img src="{{ asset('assets/fotos/erik-dos-santos-felizardo-800.jpg') }}" alt="Erik Felizardo, psicólogo e neuropsicólogo, no seu consultório" width="800" height="960" class="aspect-[5/6] w-full object-cover">
        </picture>
    </figure>

    <p>Sou Erik Felizardo, psicólogo e neuropsicólogo, com formação em Psicologia pela Universidade Nove de Julho (UNINOVE), no Brasil, e Mestrado em Neuropsicologia pela Universidade Católica Portuguesa. Possuo ainda o grau de Mestre em Psicologia reconhecido pela Universidade do Minho, em Portugal, e sou membro efetivo da Ordem dos Psicólogos Portugueses (OPP).</p>

    <p>Ao longo da minha trajetória, tenho procurado compreender cada pessoa de forma individualizada, considerando a sua história, as suas características e o contexto em que está inserida. O meu trabalho é orientado pela ciência, pela escuta ativa e pela construção de estratégias que promovam saúde psicológica, autonomia e qualidade de vida.</p>

    <p>Atendo pessoas de diferentes idades e contextos, com especial atenção às <a href="{{ route('paginas.neurodivergencia') }}">perturbações do neurodesenvolvimento</a>, <a href="{{ route('paginas.ansiedade') }}">ansiedade</a>, <a href="{{ route('paginas.depressao') }}">depressão</a> e dificuldades nos <a href="{{ route('paginas.outros-temas') }}">relacionamentos interpessoais e conjugais</a>.</p>

    <blockquote>Acredito que cada pessoa possui uma história única e que o acompanhamento psicológico deve respeitar essa singularidade, ajudando-a a desenvolver recursos para enfrentar desafios, construir relações mais saudáveis e alcançar uma vida mais equilibrada e funcional.</blockquote>

    <h2>Formação académica</h2>
    <ul>
        @foreach (config('site.psicologo.formacao') as $formacao)
            <li><strong>{{ $formacao['curso'] }}</strong> · {{ $formacao['instituicao'] }} ({{ $formacao['pais'] }})</li>
        @endforeach
        <li><strong>Membro efetivo da Ordem dos Psicólogos Portugueses</strong> · {{ config('site.psicologo.registro') }}</li>
    </ul>

    <h2>Como trabalho</h2>
    <p>A minha principal abordagem é a <a href="{{ route('paginas.terapia-cognitivo-comportamental-tcc') }}">Terapia Cognitivo-Comportamental (TCC)</a>. Na intervenção com pessoas autistas e com <a href="{{ route('paginas.tdah-phda') }}">PHDA (TDAH)</a>, utilizo estratégias fundamentadas na <a href="{{ route('paginas.o-que-e-aba') }}">Análise do Comportamento Aplicada (ABA)</a>. Realizo também <a href="{{ route('paginas.o-que-e-neuropsicologia') }}">avaliação neuropsicológica</a>.</p>
    <p>Os acompanhamentos podem ser online, em consultório, ao domicílio ou em contexto escolar, para pessoas que vivem em Portugal, no Brasil ou noutros países. Saiba mais em <a href="{{ route('paginas.atendimento-psicologico') }}">sobre o meu atendimento</a>.</p>
</x-layouts.artigo>
