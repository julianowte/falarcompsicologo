# {{ config('site.nome') }} · Psicólogo {{ config('site.psicologo.nome') }}

> {{ config('site.descricao') }}

{{ config('site.nome') }} é o site do psicólogo {{ config('site.psicologo.nome_completo') }} ({{ config('site.psicologo.crp') }}), que oferece psicoterapia online em português para adultos que vivem em Portugal e no Brasil, e também para brasileiros e portugueses no exterior. O agendamento e todo o contato acontecem somente pelo WhatsApp.

## Fatos

- Profissional: {{ config('site.psicologo.nome_completo') }}, psicólogo
- Registro: {{ config('site.psicologo.crp') }} (Conselho Regional de Psicologia)
- Países atendidos: Portugal e Brasil (e brasileiros e portugueses no exterior)
- Atendimento: online, por videochamada, em português
- Fuso horário: sessões combinadas no horário de Lisboa ou de Brasília
- Valores: em euros ou em reais, informados pelo WhatsApp
- Público: adultos
- Duração da sessão: cerca de 50 minutos
- Contato e agendamento: somente pelo WhatsApp ({{ $whatsappUrl }})
- Site: {{ route('inicio') }}

## Temas atendidos

@foreach (config('site.temas') as $tema)
- {{ $tema['titulo'] }}: {{ $tema['texto'] }}
@endforeach

## Como começar

@foreach (config('site.etapas') as $etapa)
{{ $loop->iteration }}. {{ $etapa['titulo'] }}: {{ $etapa['texto'] }}
@endforeach

## Dúvidas frequentes

@foreach (config('site.duvidas') as $duvida)
### {{ $duvida['pergunta'] }}

{{ $duvida['resposta'] }}

@endforeach
## Páginas

- [Início]({{ route('inicio') }})
- [Política de privacidade]({{ route('privacidade') }})
