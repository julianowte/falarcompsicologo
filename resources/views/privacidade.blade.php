@php
    $url = route('privacidade');
    $grafo = [
        [
            '@type' => 'WebPage',
            '@id' => $url.'#pagina',
            'url' => $url,
            'name' => 'Política de privacidade',
            'inLanguage' => 'pt-BR',
            'isPartOf' => ['@id' => url('/').'#website'],
            'dateModified' => config('site.atualizado_em'),
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Início', 'item' => route('inicio')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Política de privacidade', 'item' => $url],
            ],
        ],
    ];
@endphp

<x-layouts.site
    titulo="Política de privacidade | Falar com Psicólogo"
    descricao="Como o site Falar com Psicólogo trata seus dados: não há formulários nem cadastro, e o contato com o psicólogo Erik acontece somente pelo WhatsApp."
    :canonica="$url"
    :grafo="$grafo"
>
    <article class="secao">
        <div class="conteudo max-w-3xl">
            <nav aria-label="Trilha" class="text-sm text-texto-suave">
                <a href="{{ route('inicio') }}" class="hover:text-salvia-escuro">Início</a>
                <span aria-hidden="true"> / </span>
                <span aria-current="page">Política de privacidade</span>
            </nav>

            <h1 class="mt-6 font-display text-[34px] leading-10 font-medium sm:text-[40px] sm:leading-[48px]">Política de privacidade</h1>
            <p class="mt-4 text-sm text-texto-suave">Atualizada em {{ \Illuminate\Support\Carbon::parse(config('site.atualizado_em'))->format('d/m/Y') }}</p>

            <div class="texto-legal">
                <p>O sigilo é a base do trabalho do psicólogo, e isso vale também para este site. Aqui explicamos, de forma simples, quais dados são tratados e como, de acordo com o Regulamento Geral sobre a Proteção de Dados (RGPD), em Portugal, e com a Lei Geral de Proteção de Dados (LGPD, Lei nº 13.709/2018), no Brasil.</p>

                <h2>Quem é o responsável</h2>
                <p>Psicólogo {{ config('site.psicologo.nome_completo') }}, {{ config('site.psicologo.registro') }}, responsável pelo site {{ config('site.nome') }}.</p>

                <h2>Quais dados o site coleta</h2>
                <p>Este site não tem formulários, cadastro nem área de login. Ele não pede nome, e-mail, telefone ou qualquer informação sobre a sua saúde.</p>
                <p>Como qualquer site, o servidor de hospedagem registra dados técnicos de acesso (como endereço IP, data e hora e o navegador usado), por segurança e para manter o site funcionando.</p>

                <h2>Contato pelo WhatsApp</h2>
                <p>Ao clicar em "Conversar no WhatsApp", você sai do site e abre uma conversa no aplicativo WhatsApp, da Meta. A partir daí, valem também os termos e a política de privacidade do WhatsApp.</p>
                <p>As mensagens trocadas são usadas apenas para agendar e conduzir o atendimento, e são tratadas com o mesmo sigilo exigido pelo Código Deontológico da Ordem dos Psicólogos Portugueses.</p>

                <h2>Cookies</h2>
                <p>O site usa apenas os cookies técnicos necessários para funcionar. Não usamos cookies de publicidade.</p>

                <h2>Seus direitos</h2>
                <p>Você pode pedir, a qualquer momento, acesso, correção ou exclusão dos seus dados pessoais. Basta enviar o pedido pelo WhatsApp.</p>
                <ul>
                    <li><a href="{{ \App\Support\Site::whatsappUrl() }}" target="_blank" rel="noopener">Falar pelo WhatsApp</a></li>
                </ul>
            </div>
        </div>
    </article>
</x-layouts.site>
