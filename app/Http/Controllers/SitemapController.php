<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Sitemap XML com as páginas públicas do site.
     */
    public function __invoke(): Response
    {
        $atualizadoEm = config('site.atualizado_em');

        $paginas = collect(['inicio', 'privacidade'])
            ->merge(collect(config('paginas'))->keys()->map(fn (string $slug) => 'paginas.'.$slug))
            ->map(fn (string $rota) => ['url' => route($rota), 'atualizado_em' => $atualizadoEm])
            ->all();

        return response()
            ->view('sitemap', ['paginas' => $paginas])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
