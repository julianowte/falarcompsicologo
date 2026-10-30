<?php

namespace Tests\Feature;

use Tests\TestCase;

class SiteTest extends TestCase
{
    public function test_pagina_inicial_tem_metadados_de_seo_e_compartilhamento(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('<html lang="pt">', false)
            ->assertSee('<link rel="canonical" href="'.route('inicio').'">', false)
            ->assertSee('<meta name="description"', false)
            ->assertSee('<meta property="og:image" content="'.asset('android-icon-192x192.png').'">', false)
            ->assertSee('<meta name="twitter:card" content="summary">', false)
            ->assertSee('"@type":"FAQPage"', false)
            ->assertSee('"@type":"ProfessionalService"', false);
    }

    public function test_pagina_inicial_tem_whatsapp_flutuante_e_assinatura_da_wte(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('https://wa.me/'.config('site.whatsapp.numero'), false)
            ->assertSee('aria-label="Conversar com o psicólogo', false)
            ->assertSee('assets/assinatura/wte-assinatura-escura.svg', false)
            ->assertSee('href="https://wte.com.br"', false)
            ->assertSee(config('site.psicologo.registro'));
    }

    public function test_pagina_inicial_destaca_atendimento_em_portugal_e_no_brasil(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<title>Erik Felizardo · Psicólogo e Neuropsicólogo em Portugal e no Brasil</title>', false)
            ->assertSee('"areaServed":[{"@type":"Country","name":"Portugal"},{"@type":"Country","name":"Brasil"}]', false)
            ->assertSee('<meta property="og:locale:alternate" content="pt_BR">', false)
            ->assertSee('Para quem vive em Portugal')
            ->assertSee('Para quem vive no Brasil')
            ->assertSee('808 24 24 24')
            ->assertSee('188');
    }

    public function test_paginas_fora_de_producao_nao_sao_indexadas(): void
    {
        $this->get('/')->assertSee('<meta name="robots" content="noindex, nofollow">', false);
        $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /');
    }

    public function test_pagina_de_privacidade_responde(): void
    {
        $this->get('/politica-de-privacidade')
            ->assertOk()
            ->assertSee('"@type":"BreadcrumbList"', false);
    }

    public function test_pagina_inexistente_retorna_404_de_verdade_e_sem_indexacao(): void
    {
        $this->get('/pagina-que-nao-existe')
            ->assertNotFound()
            ->assertSee('Página não encontrada')
            ->assertSee('noindex', false)
            ->assertDontSee('rel="canonical"', false);
    }

    public function test_sitemap_lista_as_paginas_publicas(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<loc>'.route('inicio').'</loc>', false)
            ->assertSee('<loc>'.route('privacidade').'</loc>', false);
    }

    public function test_llms_txt_resume_o_site_para_ias(): void
    {
        $this->get('/llms.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('# Falar com Psicólogo')
            ->assertSee('Países atendidos: Portugal e Brasil')
            ->assertSee('somente pelo WhatsApp')
            ->assertDontSee('&quot;', false);
    }

    public function test_em_producao_robots_libera_rastreamento_e_aponta_o_sitemap(): void
    {
        $this->app['env'] = 'production';

        $this->get(config('app.url').'/robots.txt')
            ->assertOk()
            ->assertSee('Allow: /')
            ->assertSee('Sitemap: '.route('sitemap'));
    }

    public function test_em_producao_redireciona_para_o_dominio_canonico(): void
    {
        $this->app['env'] = 'production';
        config(['app.url' => 'https://falarcompsicologo.com.br']);

        $this->get('http://www.falarcompsicologo.com.br/politica-de-privacidade')
            ->assertMovedPermanently()
            ->assertRedirect('https://falarcompsicologo.com.br/politica-de-privacidade');
    }
}
