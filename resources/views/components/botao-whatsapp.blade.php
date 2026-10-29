@props(['texto' => 'Conversar no WhatsApp'])

<a href="{{ \App\Support\Site::whatsappUrl() }}" target="_blank" rel="noopener" {{ $attributes->merge(['class' => 'botao-whatsapp']) }}>
    <x-icone nome="whatsapp-conversa" class="size-5" />
    {{ $texto }}
</a>
