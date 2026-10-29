@props(['nome'])

<svg {{ $attributes->class(['shrink-0', 'size-6' => ! str_contains($attributes->get('class', ''), 'size-')]) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="{{ asset('assets/marca/icons.svg') }}#i-{{ $nome }}"/></svg>
