@php($psicologo = config('site.psicologo'))
# {{ config('site.nome') }} · {{ $psicologo['nome_publico'] }}, {{ $psicologo['titulo'] }}

> {{ config('site.descricao') }}

{{ config('site.nome') }} é o site de {{ $psicologo['nome_completo'] }} ({{ $psicologo['nome_publico'] }}), {{ mb_strtolower($psicologo['titulo']) }}, membro efetivo da {{ $psicologo['registro_entidade'] }} ({{ $psicologo['registro'] }}). Acompanha pessoas de diferentes idades que vivem em Portugal e no Brasil, e também brasileiros e portugueses no exterior, em português. O contacto e o agendamento acontecem somente pelo WhatsApp.

## Fatos

- Profissional: {{ $psicologo['nome_completo'] }} ({{ $psicologo['nome_publico'] }}), {{ mb_strtolower($psicologo['titulo']) }}
- Registro: {{ $psicologo['registro'] }} ({{ $psicologo['registro_entidade'] }}), membro efetivo
@foreach ($psicologo['formacao'] as $formacao)
- Formação: {{ $formacao['curso'] }}, {{ $formacao['instituicao'] }} ({{ $formacao['pais'] }})
@endforeach
- Abordagem principal: Terapia Cognitivo-Comportamental (TCC)
- Áreas: {{ implode(', ', $psicologo['areas']) }}
- Público: pessoas de diferentes idades, incluindo crianças, adolescentes e adultos
- Países atendidos: Portugal e Brasil (e brasileiros e portugueses no exterior)
- Modalidades: online (videochamada), consultório, domicílio e contexto escolar
- Fuso horário: sessões combinadas no horário de Lisboa ou de Brasília
- Valores: em euros ou em reais, informados pelo WhatsApp
- Duração da sessão: cerca de 50 minutos
- Contato e agendamento: somente pelo WhatsApp ({{ $whatsappUrl }})
- Site: {{ route('inicio') }}

## Páginas

- [Início]({{ route('inicio') }}): apresentação, temas, como funciona e dúvidas frequentes
@foreach (config('paginas') as $slug => $pagina)
- [{{ $pagina['menu'] }}]({{ route('paginas.'.$slug) }}): {{ $pagina['descricao'] }}
@endforeach
- [Política de privacidade]({{ route('privacidade') }})

## Como começar

@foreach (config('site.etapas') as $etapa)
{{ $loop->iteration }}. {{ $etapa['titulo'] }}: {{ $etapa['texto'] }}
@endforeach

## Dúvidas frequentes

@foreach (config('site.duvidas') as $duvida)
### {{ $duvida['pergunta'] }}

{{ $duvida['resposta'] }}

@endforeach
