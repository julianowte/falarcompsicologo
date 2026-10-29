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
        $paginas = [
            ['url' => route('inicio'), 'atualizado_em' => config('site.atualizado_em')],
            ['url' => route('privacidade'), 'atualizado_em' => config('site.atualizado_em')],
        ];

        return response()
            ->view('sitemap', ['paginas' => $paginas])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
