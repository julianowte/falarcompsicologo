<?php

namespace App\Http\Controllers;

use App\Support\Site;
use Illuminate\Http\Response;

class TextoParaRobosController extends Controller
{
    /**
     * robots.txt: libera buscadores e IAs em produção e bloqueia tudo nos demais ambientes.
     */
    public function robots(): Response
    {
        $linhas = app()->isProduction()
            ? ['User-agent: *', 'Allow: /', '', 'Sitemap: '.route('sitemap')]
            : ['User-agent: *', 'Disallow: /'];

        return $this->texto(implode("\n", $linhas)."\n");
    }

    /**
     * llms.txt: resumo do site em Markdown para assistentes de IA (GEO).
     */
    public function llms(): Response
    {
        $markdown = view('llms', [
            'whatsappUrl' => Site::whatsappUrl(),
            'localidade' => Site::localidade(),
        ])->render();

        return $this->texto(html_entity_decode($markdown, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    private function texto(string $conteudo): Response
    {
        return response($conteudo)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
