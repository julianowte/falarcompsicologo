<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PaginasDeConteudoTest extends TestCase
{
    /**
     * @return array<string, array{0: string}>
     */
    public static function slugs(): array
    {
        $paginas = require __DIR__.'/../../config/paginas.php';

        return collect(array_keys($paginas))->mapWithKeys(fn (string $slug) => [$slug => [$slug]])->all();
    }

    #[DataProvider('slugs')]
    public function test_pagina_tem_seo_completo(string $slug): void
    {
        $pagina = config('paginas.'.$slug);
        $titulo = str_contains($pagina['titulo'], 'Erik Felizardo') ? $pagina['titulo'] : $pagina['titulo'].' | Erik Felizardo';

        $this->get('/'.$slug)
            ->assertOk()
            ->assertSee('<title>'.e($titulo).'</title>', false)
            ->assertSee('<meta name="description" content="'.e($pagina['descricao']).'">', false)
            ->assertSee('<link rel="canonical" href="'.route('paginas.'.$slug).'">', false)
            ->assertSee('<meta property="og:type" content="article">', false)
            ->assertSee('<h1', false)
            ->assertSee(e($pagina['h1']), false)
            ->assertSee('"@type":"'.$pagina['tipo'].'"', false)
            ->assertSee('"@type":"BreadcrumbList"', false);
    }

    #[DataProvider('slugs')]
    public function test_pagina_esta_no_menu_no_sitemap_e_no_llms(string $slug): void
    {
        $url = route('paginas.'.$slug);

        $this->get('/')->assertSee('href="'.$url.'"', false);
        $this->get('/sitemap.xml')->assertSee('<loc>'.$url.'</loc>', false);
        $this->get('/llms.txt')->assertSee('('.$url.')', false);
    }

    public function test_paginas_de_saude_sao_revistas_pelo_psicologo_e_trazem_aviso(): void
    {
        $this->get('/ansiedade')
            ->assertOk()
            ->assertSee('"@type":"MedicalWebPage"', false)
            ->assertSee('"reviewedBy":{"@id":"'.url('/').'#psicologo"}', false)
            ->assertSee('"lastReviewed":"'.config('site.atualizado_em').'"', false)
            ->assertSee('não substitui uma avaliação');
    }

    public function test_quem_e_erik_e_a_pagina_de_perfil_do_psicologo(): void
    {
        $this->get('/quem-e-erik-felizardo-psicologo-em-portugal-e-brasil')
            ->assertOk()
            ->assertSee('"@type":"ProfilePage"', false)
            ->assertSee('"mainEntity":{"@id":"'.url('/').'#psicologo"}', false)
            ->assertSee('Universidade Católica Portuguesa')
            ->assertDontSee('não substitui uma avaliação');
    }
}
