{{-- Página de erro com a identidade do site. Sempre noindex e sem canonical, para o Google não indexar o erro (evita soft 404). --}}
<x-layouts.site :titulo="$titulo.' | Falar com Psicólogo'" :descricao="$texto" canonica="" :indexar="false">
    <section class="secao">
        <div class="conteudo flex max-w-2xl flex-col items-center text-center">
            <img src="{{ asset('assets/marca/fcp-simbolo.svg') }}" alt="" width="96" height="96" class="size-24">
            <p class="rotulo mt-8">Erro {{ $codigo }}</p>
            <h1 class="mt-4 font-display text-[34px] leading-10 font-medium text-balance sm:text-[40px] sm:leading-[48px]">{{ $titulo }}</h1>
            <p class="corpo-grande mt-5">{{ $texto }}</p>
            <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('inicio') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-salvia-escuro px-6 py-4 font-bold text-salvia-escuro transition-colors hover:bg-salvia-claro">Voltar para o início</a>
                <x-botao-whatsapp />
            </div>
        </div>
    </section>
</x-layouts.site>
