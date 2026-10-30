@php
    $psicologo = config('site.psicologo');
    $url = route('inicio');

    $grafo = [
        [
            '@type' => 'WebPage',
            '@id' => $url.'#pagina',
            'url' => $url,
            'name' => $psicologo['nome_publico'].' · Psicólogo e Neuropsicólogo em Portugal e no Brasil',
            'description' => config('site.descricao'),
            'inLanguage' => 'pt',
            'isPartOf' => ['@id' => url('/').'#website'],
            'about' => ['@id' => url('/').'#consultorio'],
            'dateModified' => config('site.atualizado_em'),
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $url.'#duvidas',
            'mainEntity' => collect(config('site.duvidas'))->map(fn (array $duvida) => [
                '@type' => 'Question',
                'name' => $duvida['pergunta'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $duvida['resposta']],
            ])->all(),
        ],
        [
            '@type' => 'HowTo',
            '@id' => $url.'#como-funciona',
            'name' => 'Como começar a terapia com o psicólogo '.$psicologo['nome'],
            'step' => collect(config('site.etapas'))->values()->map(fn (array $etapa, int $indice) => [
                '@type' => 'HowToStep',
                'position' => $indice + 1,
                'name' => $etapa['titulo'],
                'text' => $etapa['texto'],
            ])->all(),
        ],
    ];
@endphp

<x-layouts.site
    :titulo="$psicologo['nome_publico'].' · Psicólogo e Neuropsicólogo em Portugal e no Brasil'"
    :canonica="$url"
    :grafo="$grafo"
>
    {{-- Hero --}}
    <section class="pt-12 pb-[72px] sm:pt-16 lg:pt-20 lg:pb-28">
        <div class="conteudo grid items-center gap-12 lg:grid-cols-[1.1fr_1fr] lg:gap-16">
            <div>
                <ul class="flex flex-wrap gap-2" aria-label="Países atendidos">
                    @foreach (config('site.paises') as $pais)
                        <li class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-bold ring-1 ring-borda">
                            <x-icone nome="localizacao" class="size-4 text-salvia-escuro" />
                            {{ $pais['nome'] }}
                        </li>
                    @endforeach
                </ul>
                <p class="rotulo mt-6">{{ $psicologo['titulo'] }} · Portugal e Brasil</p>
                <h1 class="mt-5 font-display text-[34px] leading-10 font-medium tracking-[-0.01em] text-balance sm:text-5xl sm:leading-[54px] lg:text-[52px] lg:leading-[58px]">
                    Você não precisa passar por isso <em class="font-normal text-salvia-escuro">sozinho</em>.
                </h1>
                <p class="corpo-grande mt-6 max-w-xl">
                    Sou {{ $psicologo['nome'] }}, psicólogo e neuropsicólogo. Acompanho pessoas de diferentes idades, oferecendo atendimento psicológico <strong class="font-bold text-tinta">online</strong> para brasileiros, portugueses e todos os falantes da língua portuguesa, onde quer que estejam no mundo.
                </p>
                <p class="corpo-grande mt-4 max-w-xl">
                    Também realizo atendimentos <strong class="font-bold text-tinta">presenciais em Portugal</strong>, sempre em um espaço seguro, acolhedor e sigiloso.
                </p>
                <div class="mt-9 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <x-botao-whatsapp />
                    <a href="#como-funciona" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-4 font-bold text-salvia-escuro transition-colors hover:bg-salvia-claro">
                        Como funciona <x-icone nome="seta-direita" class="size-5" />
                    </a>
                </div>
                <ul class="mt-10 flex flex-wrap gap-x-6 gap-y-3 text-[15px] text-texto-suave">
                    <li class="flex items-center gap-2"><x-icone nome="credenciado-crp" class="size-5 text-salvia-escuro" /> Membro efetivo da OPP</li>
                    <li class="flex items-center gap-2"><x-icone nome="mente" class="size-5 text-salvia-escuro" /> Mestre em Neuropsicologia</li>
                    <li class="flex items-center gap-2"><x-icone nome="sigilo" class="size-5 text-salvia-escuro" /> Sigilo profissional</li>
                </ul>
            </div>

            <figure class="relative mx-auto w-full max-w-md pr-6 pb-10 lg:max-w-none lg:pr-10">
                {{-- Blocos de cor da marca atrás da foto --}}
                <div class="absolute top-10 right-0 bottom-0 left-10 rounded-marca bg-salvia" aria-hidden="true"></div>
                <div class="absolute -top-4 right-2 size-28 rounded-full bg-lavanda sm:size-36" aria-hidden="true"></div>

                <picture class="relative block overflow-hidden rounded-marca">
                    <source type="image/webp" srcset="{{ asset('assets/fotos/erik-dos-santos-felizardo-480.webp') }} 480w, {{ asset('assets/fotos/erik-dos-santos-felizardo-800.webp') }} 800w, {{ asset('assets/fotos/erik-dos-santos-felizardo-1145.webp') }} 1145w" sizes="(min-width: 1024px) 520px, (min-width: 448px) 448px, 92vw">
                    <img src="{{ asset('assets/fotos/erik-dos-santos-felizardo-800.jpg') }}" alt="Foto do psicólogo {{ $psicologo['nome_completo'] }} sorrindo, de blazer azul, em seu consultório" width="800" height="960" fetchpriority="high" class="aspect-[5/6] w-full object-cover">
                </picture>

                <figcaption class="absolute bottom-0 -left-2 flex max-w-[85%] items-center gap-4 rounded-marca bg-white p-4 pr-6 ring-1 ring-borda sm:-left-6 sm:p-5 sm:pr-7">
                    <img src="{{ asset('assets/marca/fcp-simbolo.svg') }}" alt="" width="44" height="44" class="size-11 shrink-0">
                    <span>
                        <span class="block font-display text-lg leading-6 font-semibold">{{ $psicologo['nome_completo'] }}</span>
                        <span class="mt-1 block text-sm leading-5 text-texto-suave">{{ $psicologo['titulo'] }} · {{ $psicologo['registro'] }}</span>
                    </span>
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- Sobre o Erik: curto, com links para as páginas completas --}}
    <section id="sobre" class="secao bg-white">
        <div class="conteudo grid gap-12 lg:grid-cols-[1fr_1.5fr] lg:gap-20">
            <div>
                <p class="rotulo">Quem é Erik</p>
                <div class="mt-4 flex items-center gap-5">
                    <img src="{{ asset('assets/fotos/erik-dos-santos-felizardo-480.webp') }}" alt="" width="80" height="80" loading="lazy" class="size-20 shrink-0 rounded-full object-cover object-top ring-4 ring-salvia-claro">
                    <h2 class="titulo-secao">Olá, eu sou o {{ $psicologo['nome'] }}</h2>
                </div>
                <p class="corpo-grande mt-6">Compreender cada pessoa na sua história e no seu contexto, com um trabalho orientado pela ciência e pela escuta ativa.</p>
                <ul class="mt-6 flex flex-wrap gap-2" aria-label="Formação">
                    @foreach ($psicologo['formacao'] as $formacao)
                        <li class="rounded-full bg-creme px-4 py-2 text-sm font-semibold ring-1 ring-borda">{{ \Illuminate\Support\Str::before($formacao['instituicao'], ' (') }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('paginas.quem-e-erik-felizardo-psicologo-em-portugal-e-brasil') }}" class="mt-8 inline-flex items-center gap-2 font-bold text-salvia-escuro hover:underline">
                    Conheça o meu percurso <x-icone nome="seta-direita" class="size-5" />
                </a>
            </div>

            <ul class="grid content-start gap-4 sm:grid-cols-2">
                @foreach ([
                    ['terapia-individual', 'Psicoterapia com TCC', 'Abordagem estruturada e com evidência científica.', 'terapia-cognitivo-comportamental-tcc'],
                    ['criancas-adolescentes', 'Autismo e PHDA', 'Intervenção no neurodesenvolvimento, com base em ABA.', 'o-que-e-aba'],
                    ['mente', 'Avaliação neuropsicológica', 'Atenção, memória e funções executivas.', 'o-que-e-neuropsicologia'],
                    ['atendimento-presencial', 'Onde atendo', 'Online, consultório, domicílio e escola.', 'atendimento-psicologico'],
                ] as [$icone, $titulo, $texto, $destino])
                    <li>
                        <a href="{{ route('paginas.'.$destino) }}" class="group flex h-full gap-5 rounded-marca border border-borda p-6 transition-colors hover:border-salvia">
                            <x-bloco-icone :nome="$icone" :tom="$loop->index" />
                            <span>
                                <span class="block font-display text-xl leading-7 font-semibold">{{ $titulo }}</span>
                                <span class="mt-1 block text-[15px] leading-6 text-texto-suave">{{ $texto }}</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Portugal e Brasil --}}
    <section id="atendimento" class="secao bg-salvia-claro">
        <div class="conteudo">
            <div class="max-w-2xl">
                <p class="rotulo">Portugal e Brasil</p>
                <h2 class="titulo-secao mt-4">Em Portugal, no Brasil ou onde você estiver</h2>
                <p class="corpo-grande mt-4">Sessões em português, com horários combinados no seu fuso. A distância não precisa ser um obstáculo para se cuidar.</p>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach (config('site.paises') as $pais)
                    <article class="rounded-marca bg-white p-8 sm:p-10">
                        <div class="flex items-center justify-between gap-4">
                            <x-bloco-icone nome="localizacao" :tom="$loop->index + 1" />
                            <span class="font-display text-5xl leading-none font-semibold text-salvia" aria-hidden="true">{{ $pais['codigo'] }}</span>
                        </div>
                        <h3 class="mt-6 font-display text-[22px] leading-[30px] font-semibold">{{ $pais['titulo'] }}</h3>
                        <p class="mt-3 text-texto-suave">{{ $pais['texto'] }}</p>
                    </article>
                @endforeach
                <article class="rounded-marca bg-white p-8 sm:p-10">
                    <x-bloco-icone nome="atendimento-online" :tom="0" />
                    <h3 class="mt-6 font-display text-[22px] leading-[30px] font-semibold">Psicoterapia em português, sem fronteiras</h3>
                    <p class="mt-3 text-texto-suave">A terapia pode chegar até você, onde quer que esteja. Por videochamada, ofereço acompanhamento psicológico na sua língua materna, com o mesmo cuidado, acolhimento e sigilo de um atendimento presencial.</p>
                    <p class="mt-3 text-texto-suave">Porque estar longe de casa não significa precisar enfrentar tudo sozinho.</p>
                </article>
            </div>
            <ul class="mt-10 flex flex-wrap gap-x-8 gap-y-3 text-[15px] text-texto-suave">
                <li class="flex items-center gap-2"><x-icone nome="horario" class="size-5 text-salvia-escuro" /> Horários no fuso de Lisboa ou de Brasília</li>
                <li class="flex items-center gap-2"><x-icone nome="conversa" class="size-5 text-salvia-escuro" /> Sessões em português</li>
                <li class="flex items-center gap-2"><x-icone nome="agendar" class="size-5 text-salvia-escuro" /> Valores em euros ou em reais</li>
            </ul>
        </div>
    </section>

    {{-- Temas --}}
    <section id="temas" class="secao bg-white">
        <div class="conteudo">
            <div class="max-w-2xl">
                <p class="rotulo">Temas que atendo</p>
                <h2 class="titulo-secao mt-4">Como posso te ajudar</h2>
                <p class="corpo-grande mt-4">Não existe motivo pequeno para procurar ajuda. Conheça alguns dos temas com que trabalho.</p>
            </div>
            <ul class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (config('site.temas') as $tema)
                    <li>
                        <a href="{{ route('paginas.'.$tema['pagina']) }}" class="group flex h-full flex-col rounded-marca border border-borda bg-white p-7 transition-colors hover:border-salvia">
                            <x-bloco-icone :nome="$tema['icone']" :tom="$loop->index" />
                            <h3 class="mt-5 font-display text-[22px] leading-[30px] font-semibold">{{ $tema['titulo'] }}</h3>
                            <p class="mt-2 text-[15px] leading-6 text-texto-suave">{{ $tema['texto'] }}</p>
                            <span class="mt-auto flex items-center gap-1.5 pt-4 text-[15px] font-bold text-salvia-escuro">Saiba mais <x-icone nome="seta-direita" class="size-4 transition-transform group-hover:translate-x-1" /></span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('paginas.outros-temas') }}" class="mt-8 inline-flex items-center gap-2 font-bold text-salvia-escuro hover:underline">
                Ver outros temas <x-icone nome="seta-direita" class="size-5" />
            </a>
        </div>
    </section>

    {{-- Como funciona --}}
    <section id="como-funciona" class="secao">
        <div class="conteudo">
            <div class="max-w-2xl">
                <p class="rotulo">Como funciona</p>
                <h2 class="titulo-secao mt-4">Começar é mais simples do que parece</h2>
                <p class="corpo-grande mt-4">Todo o contato é feito pelo WhatsApp, sem formulários e sem cadastro.</p>
            </div>
            <ol class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach (config('site.etapas') as $etapa)
                    <li class="rounded-marca border border-borda bg-white p-8">
                        <span class="flex size-11 items-center justify-center rounded-full bg-lavanda-claro font-display text-xl font-semibold text-lavanda-escuro">{{ $loop->iteration }}</span>
                        <h3 class="mt-6 font-display text-[22px] leading-[30px] font-semibold">{{ $etapa['titulo'] }}</h3>
                        <p class="mt-3 text-base leading-[26px] text-texto-suave">{{ $etapa['texto'] }}</p>
                    </li>
                @endforeach
            </ol>
            <div class="mt-10">
                <x-botao-whatsapp texto="Mandar mensagem agora" />
            </div>
        </div>
    </section>

    {{-- Dúvidas --}}
    <section id="duvidas" class="secao bg-white">
        <div class="conteudo grid gap-12 lg:grid-cols-[1fr_1.6fr] lg:gap-20">
            <div>
                <p class="rotulo">Dúvidas frequentes</p>
                <h2 class="titulo-secao mt-4">Perguntas que muita gente faz antes de começar</h2>
                <p class="corpo-grande mt-4">Ficou alguma dúvida? Pode perguntar pelo WhatsApp, sem compromisso.</p>
            </div>
            <div class="divide-y divide-borda rounded-marca border border-borda bg-white">
                @foreach (config('site.duvidas') as $duvida)
                    <details class="group p-6 sm:px-8" @if ($loop->first) open @endif>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-6 font-bold [&::-webkit-details-marker]:hidden">
                            <h3>{{ $duvida['pergunta'] }}</h3>
                            <x-icone nome="mais" class="size-5 text-salvia-escuro transition-transform group-open:rotate-45" />
                        </summary>
                        <p class="mt-4 text-texto-suave">{{ $duvida['resposta'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Chamada final --}}
    <section class="pb-[72px] lg:pb-28">
        <div class="conteudo">
            <div class="relative overflow-hidden rounded-marca bg-salvia-escuro px-6 py-14 text-center text-white sm:px-12 lg:py-20">
                <div class="absolute -top-20 -right-16 size-64 rounded-full bg-white/5" aria-hidden="true"></div>
                <div class="absolute -bottom-24 -left-16 size-72 rounded-full bg-white/5" aria-hidden="true"></div>
                <h2 class="relative mx-auto max-w-2xl font-display text-[30px] leading-10 font-medium text-balance sm:text-4xl sm:leading-[46px]">
                    Quando estiver pronto, <em class="font-normal">estou aqui</em> para ouvir.
                </h2>
                <p class="relative mx-auto mt-5 max-w-xl text-lg leading-[30px] text-white/85">Mande uma mensagem e combinamos a primeira conversa.</p>
                <a href="{{ \App\Support\Site::whatsappUrl() }}" target="_blank" rel="noopener" class="relative mt-9 inline-flex items-center gap-2 rounded-full bg-white px-7 py-4 font-bold text-salvia-escuro transition-colors hover:bg-creme">
                    <x-icone nome="whatsapp-conversa" class="size-5" />
                    Conversar no WhatsApp
                </a>
            </div>
        </div>
    </section>
</x-layouts.site>
