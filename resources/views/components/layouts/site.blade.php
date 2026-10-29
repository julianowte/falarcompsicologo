@props([
    'titulo',
    'descricao' => config('site.descricao'),
    'canonica' => url()->current(),
    'indexar' => true,
    'grafo' => [],
])

@php
    $indexar = $indexar && app()->isProduction();
    $imagemCompartilhamento = asset('android-icon-512x512.png');
    $dadosEstruturados = [
        '@context' => 'https://schema.org',
        '@graph' => array_merge(\App\Support\Site::grafoBase(), $grafo),
    ];
    $menu = [
        'Portugal e Brasil' => route('inicio').'#atendimento',
        'Como posso ajudar' => route('inicio').'#temas',
        'Sobre' => route('inicio').'#sobre',
        'Como funciona' => route('inicio').'#como-funciona',
        'Dúvidas' => route('inicio').'#duvidas',
    ];
@endphp

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $titulo }}</title>
    <meta name="description" content="{{ $descricao }}">
    <meta name="robots" content="{{ $indexar ? 'index, follow, max-image-preview:large, max-snippet:-1' : 'noindex, nofollow' }}">
    <meta name="author" content="Psicólogo {{ config('site.psicologo.nome_completo') }} · {{ config('site.psicologo.crp') }}">
    @if ($canonica)
        <link rel="canonical" href="{{ $canonica }}">
    @endif
    <link rel="alternate" type="text/plain" title="llms.txt" href="{{ route('llms') }}">

    {{-- Compartilhamento (WhatsApp, Facebook, LinkedIn, X): cartão com o ícone da marca --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('site.nome') }}">
    <meta property="og:locale" content="pt_PT">
    <meta property="og:locale:alternate" content="pt_BR">
    <meta property="og:title" content="{{ $titulo }}">
    <meta property="og:description" content="{{ $descricao }}">
    <meta property="og:url" content="{{ $canonica ?: url()->current() }}">
    <meta property="og:image" content="{{ $imagemCompartilhamento }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="512">
    <meta property="og:image:height" content="512">
    <meta property="og:image:alt" content="Símbolo do Falar com Psicólogo: balão de conversa com a letra ψ">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $titulo }}">
    <meta name="twitter:description" content="{{ $descricao }}">
    <meta name="twitter:image" content="{{ $imagemCompartilhamento }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#3D6B5A">

    <link rel="preload" href="{{ asset('assets/fonts/fraunces-latin-500-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/nunito-latin-400-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">{!! json_encode($dadosEstruturados, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
</head>
<body>
    <a href="#conteudo" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-full focus:bg-white focus:px-5 focus:py-3 focus:font-bold">Pular para o conteúdo</a>

    <header class="sticky top-0 z-40 border-b border-borda bg-creme/95 backdrop-blur">
        <div class="conteudo flex h-20 items-center justify-between gap-6">
            <a href="{{ route('inicio') }}" class="shrink-0" aria-label="Falar com Psicólogo — início">
                <img src="{{ asset('assets/marca/fcp-logo-horizontal.svg') }}" alt="Falar com Psicólogo" width="172" height="45" class="h-[45px] w-auto">
            </a>

            <nav class="hidden items-center gap-7 lg:flex" aria-label="Principal">
                @foreach ($menu as $rotulo => $link)
                    <a href="{{ $link }}" class="text-[15px] font-semibold text-tinta/80 transition-colors hover:text-salvia-escuro">{{ $rotulo }}</a>
                @endforeach
                <x-botao-whatsapp class="!px-5 !py-3 text-[15px]" />
            </nav>

            <button type="button" class="-mr-2 rounded-full p-2 lg:hidden" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu-celular" data-menu-botao>
                <x-icone nome="menu" data-icone-abrir />
                <x-icone nome="fechar" class="hidden" data-icone-fechar />
            </button>
        </div>

        <nav id="menu-celular" class="border-t border-borda bg-creme lg:hidden" aria-label="Principal no celular" hidden data-menu-painel>
            <ul class="conteudo py-2">
                @foreach ($menu as $rotulo => $link)
                    <li><a href="{{ $link }}" class="flex items-center justify-between border-b border-borda py-4 font-semibold">{{ $rotulo }} <x-icone nome="seta-direita" class="size-5 text-texto-suave" /></a></li>
                @endforeach
                <li class="py-4"><x-botao-whatsapp class="w-full" /></li>
            </ul>
        </nav>
    </header>

    <main id="conteudo">
        {{ $slot }}
    </main>

    <footer class="bg-tinta text-white/75">
        <div class="conteudo grid gap-12 py-16 md:grid-cols-2 lg:grid-cols-12 lg:py-20">
            <div class="lg:col-span-5">
                <img src="{{ asset('assets/marca/fcp-logo-horizontal-negativa.svg') }}" alt="Falar com Psicólogo" width="172" height="45" loading="lazy" class="h-[45px] w-auto">
                <p class="mt-6 max-w-sm text-[15px] leading-6">Terapia online em português para quem vive em Portugal, no Brasil ou no exterior. Um espaço seguro e sigiloso para você ser ouvido.</p>
                <p class="mt-6 text-sm leading-[22px]">
                    <strong class="font-bold text-white">Psicólogo {{ config('site.psicologo.nome_completo') }}</strong><br>
                    {{ config('site.psicologo.crp') }}
                    @if (\App\Support\Site::localidade())
                        · {{ \App\Support\Site::localidade() }}
                    @endif
                </p>
            </div>

            <nav class="lg:col-span-3" aria-label="Rodapé">
                <p class="rotulo !text-salvia">Navegação</p>
                <ul class="mt-5 space-y-3 text-[15px]">
                    @foreach ($menu as $rotulo => $link)
                        <li><a href="{{ $link }}" class="transition-colors hover:text-white">{{ $rotulo }}</a></li>
                    @endforeach
                    <li><a href="{{ route('privacidade') }}" class="transition-colors hover:text-white">Política de privacidade</a></li>
                </ul>
            </nav>

            <div class="md:col-span-2 lg:col-span-4">
                <p class="rotulo !text-salvia">Contato</p>
                <a href="{{ \App\Support\Site::whatsappUrl() }}" target="_blank" rel="noopener" class="mt-5 flex items-center gap-3 text-[15px] transition-colors hover:text-white">
                    <x-icone nome="whatsapp-conversa" class="size-5 text-salvia" />
                    Atendimento somente pelo WhatsApp
                </a>
                <div class="mt-8 flex gap-4 rounded-marca bg-white/5 p-5">
                    <x-icone nome="telefone" class="mt-0.5 size-5 text-lavanda" />
                    <div class="text-sm leading-[22px]">
                        <p>Em sofrimento intenso ou em risco? Procure ajuda agora:</p>
                        <ul class="mt-2 space-y-1">
                            @foreach (config('site.paises') as $pais)
                                <li>
                                    <span class="font-bold text-white">{{ $pais['nome'] }}:</span>
                                    @foreach ($pais['linhas_de_apoio'] as $linha)
                                        {{ $linha['nome'] }} <strong class="text-white">{{ $linha['numero'] }}</strong>{{ $linha['detalhe'] ? ' ('.$linha['detalhe'].')' : '' }}{{ $loop->last ? '' : ' ·' }}
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="conteudo flex flex-col items-center gap-4 pt-6 pb-24 text-sm md:flex-row md:justify-between md:pr-24 md:pb-6 xl:pr-6">
                <p>&copy; {{ date('Y') }} {{ config('site.nome') }}. Todos os direitos reservados.</p>
                <a href="https://wte.com.br" target="_blank" rel="noopener" class="inline-flex opacity-75 transition-opacity hover:opacity-100" title="Desenvolvido por WTE Fábrica de Softwares">
                    <img src="{{ asset('assets/assinatura/wte-assinatura-escura.svg') }}" alt="Desenvolvido por WTE Fábrica de Softwares" width="159" height="24" loading="lazy" class="h-[22px] w-auto">
                </a>
            </div>
        </div>
    </footer>

    {{-- Botão fixo do WhatsApp, em todas as páginas --}}
    <a href="{{ \App\Support\Site::whatsappUrl() }}" target="_blank" rel="noopener" class="group fixed right-4 bottom-4 z-50 flex items-center gap-3 sm:right-6 sm:bottom-6" aria-label="Conversar com o psicólogo {{ config('site.psicologo.nome') }} no WhatsApp">
        <span class="hidden rounded-full bg-white px-4 py-2 text-sm font-bold text-tinta ring-1 ring-borda transition-opacity sm:block sm:opacity-0 sm:group-hover:opacity-100 sm:group-focus-visible:opacity-100">Conversar no WhatsApp</span>
        <span class="flex size-14 items-center justify-center rounded-full bg-salvia-escuro text-white ring-4 ring-creme transition-transform group-hover:scale-105">
            <x-icone nome="whatsapp-conversa" class="size-7" />
        </span>
    </a>
</body>
</html>
