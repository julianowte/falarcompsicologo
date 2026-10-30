@props(['slug'])

@php
    $pagina = config('paginas.'.$slug);
    $url = route('paginas.'.$slug);
    $psicologo = config('site.psicologo');
    $atualizadoEm = config('site.atualizado_em');
    $ehConteudoDeSaude = $pagina['tipo'] === 'MedicalWebPage';
    $idPsicologo = url('/').'#psicologo';
    $grupo = $pagina['grupo'] === 'psicologia' ? 'Psicologia' : $psicologo['nome_publico'];

    $paginaSchema = [
        '@type' => $pagina['tipo'],
        '@id' => $url.'#pagina',
        'url' => $url,
        'name' => $pagina['h1'],
        'headline' => $pagina['h1'],
        'description' => $pagina['descricao'],
        'inLanguage' => 'pt',
        'isPartOf' => ['@id' => url('/').'#website'],
        'breadcrumb' => ['@id' => $url.'#trilha'],
        'author' => ['@id' => $idPsicologo],
        'dateModified' => $atualizadoEm,
        'primaryImageOfPage' => asset('assets/fotos/erik-dos-santos-felizardo-800.jpg'),
    ];

    if ($pagina['tipo'] === 'ProfilePage') {
        $paginaSchema['mainEntity'] = ['@id' => $idPsicologo];
    }

    if ($ehConteudoDeSaude) {
        $paginaSchema['reviewedBy'] = ['@id' => $idPsicologo];
        $paginaSchema['lastReviewed'] = $atualizadoEm;
    }

    if (isset($pagina['assunto'])) {
        $paginaSchema['about'] = $pagina['assunto'];
    }

    $grafo = [
        $paginaSchema,
        [
            '@type' => 'BreadcrumbList',
            '@id' => $url.'#trilha',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Início', 'item' => route('inicio')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $pagina['menu'], 'item' => $url],
            ],
        ],
    ];

    $relacionados = collect($pagina['relacionados'] ?? [])->mapWithKeys(fn (string $relacionado) => [$relacionado => config('paginas.'.$relacionado)]);
    $mesmoGrupo = collect(config('paginas'))->where('grupo', $pagina['grupo']);
    $tituloCompleto = str_contains($pagina['titulo'], $psicologo['nome_publico'])
        ? $pagina['titulo']
        : $pagina['titulo'].' | '.$psicologo['nome_publico'];
@endphp

<x-layouts.site
    :titulo="$tituloCompleto"
    :descricao="$pagina['descricao']"
    :canonica="$url"
    :grafo="$grafo"
    tipo-open-graph="article"
>
    <article>
        <header class="pt-10 pb-12 sm:pt-14 lg:pb-16">
            <div class="conteudo">
                <nav aria-label="Trilha" class="text-sm text-texto-suave">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="{{ route('inicio') }}" class="hover:text-salvia-escuro">Início</a></li>
                        <li aria-hidden="true">/</li>
                        <li><span>{{ $grupo }}</span></li>
                        <li aria-hidden="true">/</li>
                        <li><span aria-current="page" class="font-semibold text-tinta">{{ $pagina['menu'] }}</span></li>
                    </ol>
                </nav>

                <div class="mt-8 max-w-3xl">
                    <p class="rotulo">{{ $grupo }}</p>
                    <h1 class="mt-4 font-display text-[34px] leading-10 font-medium tracking-[-0.01em] text-balance sm:text-[44px] sm:leading-[52px]">{{ $pagina['h1'] }}</h1>
                    <p class="corpo-grande mt-5">{{ $pagina['resumo'] }}</p>

                    <div class="mt-8 flex items-center gap-4">
                        <img src="{{ asset('assets/fotos/erik-dos-santos-felizardo-480.webp') }}" alt="" width="52" height="52" class="size-13 shrink-0 rounded-full object-cover object-top ring-2 ring-salvia-claro">
                        <p class="text-sm leading-[22px] text-texto-suave">
                            {{ $ehConteudoDeSaude ? 'Escrito e revisto por' : 'Por' }}
                            <a href="{{ route('paginas.quem-e-erik-felizardo-psicologo-em-portugal-e-brasil') }}" class="font-bold text-tinta hover:text-salvia-escuro">{{ $psicologo['nome_publico'] }}</a>,
                            {{ mb_strtolower($psicologo['titulo']) }} · {{ $psicologo['registro'] }}<br>
                            Atualizado em <time datetime="{{ $atualizadoEm }}">{{ \Illuminate\Support\Carbon::parse($atualizadoEm)->format('d/m/Y') }}</time>
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <div class="border-t border-borda bg-white py-14 lg:py-20">
            <div class="conteudo grid gap-14 lg:grid-cols-[minmax(0,1fr)_320px] lg:gap-20">
                <div class="max-w-[68ch]">
                    <div class="texto-artigo">
                        {{ $slot }}
                    </div>

                    @if ($ehConteudoDeSaude)
                        <aside class="mt-14 flex gap-4 rounded-marca bg-creme p-6 text-[15px] leading-6 text-texto-suave" aria-label="Aviso">
                            <x-icone nome="duvidas" class="mt-0.5 size-5 text-lavanda-escuro" />
                            <p>
                                Este conteúdo é informativo e não substitui uma avaliação feita por um profissional de saúde.
                                Em sofrimento intenso ou em risco, procure ajuda imediata:
                                <strong class="text-tinta">Portugal</strong> SNS 24 808 24 24 24 ou 112 ·
                                <strong class="text-tinta">Brasil</strong> CVV 188 ou SAMU 192.
                            </p>
                        </aside>
                    @endif
                </div>

                <aside class="space-y-6 lg:sticky lg:top-28 lg:self-start">
                    <div class="rounded-marca bg-salvia-claro p-7">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/fotos/erik-dos-santos-felizardo-480.webp') }}" alt="" width="64" height="64" loading="lazy" class="size-16 shrink-0 rounded-full object-cover object-top ring-4 ring-white">
                            <div>
                                <p class="font-display text-lg leading-6 font-semibold">{{ $psicologo['nome_publico'] }}</p>
                                <p class="mt-1 text-sm leading-5 text-texto-suave">{{ $psicologo['titulo'] }}</p>
                            </div>
                        </div>
                        <p class="mt-5 text-[15px] leading-6">Quer conversar sobre isto? O primeiro contacto é feito pelo WhatsApp, sem compromisso.</p>
                        <x-botao-whatsapp class="mt-5 w-full !px-5 text-[15px]" />
                    </div>

                    <nav class="rounded-marca border border-borda p-6" aria-label="{{ $grupo }}">
                        <p class="rotulo">{{ $pagina['grupo'] === 'psicologia' ? 'Temas de Psicologia' : 'Conheça o Erik' }}</p>
                        <ul class="mt-4 space-y-1">
                            @foreach ($mesmoGrupo as $outroSlug => $outraPagina)
                                <li>
                                    <a href="{{ route('paginas.'.$outroSlug) }}" @if ($outroSlug === $slug) aria-current="page" @endif class="block rounded-xl px-3 py-2 text-[15px] font-semibold text-tinta/80 transition-colors hover:bg-creme aria-[current=page]:bg-salvia-claro aria-[current=page]:text-salvia-escuro">{{ $outraPagina['menu'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>

        @if ($relacionados->isNotEmpty())
            <section class="secao" aria-labelledby="leia-tambem">
                <div class="conteudo">
                    <p class="rotulo">Continue a ler</p>
                    <h2 id="leia-tambem" class="titulo-secao mt-4">Leia também</h2>
                    <ul class="mt-10 grid gap-6 md:grid-cols-3">
                        @foreach ($relacionados as $relacionadoSlug => $relacionado)
                            <li>
                                <a href="{{ route('paginas.'.$relacionadoSlug) }}" class="group flex h-full flex-col rounded-marca border border-borda bg-white p-7 transition-colors hover:border-salvia">
                                    <x-bloco-icone :nome="$relacionado['icone']" :tom="$loop->index" />
                                    <h3 class="mt-5 font-display text-xl leading-7 font-semibold">{{ $relacionado['menu'] }}</h3>
                                    <p class="mt-2 text-[15px] leading-6 text-texto-suave">{{ $relacionado['descricao'] }}</p>
                                    <span class="mt-auto flex items-center gap-2 pt-5 font-bold text-salvia-escuro">Ler artigo <x-icone nome="seta-direita" class="size-5 transition-transform group-hover:translate-x-1" /></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </article>
</x-layouts.site>
