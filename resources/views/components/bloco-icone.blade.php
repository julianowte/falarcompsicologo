@props(['nome', 'tom' => 0])

@php
    $tons = [
        'bg-salvia-claro text-salvia-escuro',
        'bg-lavanda-claro text-lavanda-escuro',
        'bg-pessego-claro text-terracota',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex size-14 shrink-0 items-center justify-center rounded-[18px] '.$tons[$tom % 3]]) }}>
    <x-icone :nome="$nome" class="size-6" />
</span>
